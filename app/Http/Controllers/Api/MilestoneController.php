<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MilestoneController extends Controller
{
    public function index(Request $request, string $projectId): JsonResponse
    {
        try {
            $project = Project::find($projectId);

            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            $query = Milestone::with(['type', 'documents'])
                ->where('project_id', $projectId);

            // Apply filters
            if ($request->has('search') && $request->search) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->search . '%')
                      ->orWhere('description', 'like', '%' . $request->search . '%')
                      ->orWhere('responsible', 'like', '%' . $request->search . '%');
                });
            }

            if ($request->has('state') && $request->state) {
                $query->where('state', $request->state);
            }

            if ($request->has('type_id') && $request->type_id) {
                $query->where('type_id', $request->type_id);
            }

            $perPage = $request->get('per_page', 15);
            $milestones = $query->orderBy('date', 'desc')->orderBy('created_at', 'desc')->paginate($perPage);

            return response()->json([
                'success' => true,
                'data' => $milestones,
                'message' => 'Hitos obtenidos exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los hitos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request, string $projectId): JsonResponse
    {
        try {
            $project = Project::find($projectId);

            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'type_id' => 'required|exists:milestone_types,id',
                'date' => 'required|date',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'responsible' => 'required|string|max:255',
                'participants' => 'nullable|array',
                'participants.*' => 'string|max:255',
                'notes' => 'nullable|string',
                'state' => 'sometimes|string|in:pending,in_progress,completed,cancelled',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Generate unique milestone code
            $lastMilestone = Milestone::orderBy('id', 'desc')->first();
            $nextId = $lastMilestone ? $lastMilestone->id + 1 : 1;
            $code = 'H-' . str_pad($projectId, 3, '0', STR_PAD_LEFT) . '-' . str_pad($nextId, 2, '0', STR_PAD_LEFT);

            $milestoneData = $request->all();
            $milestoneData['code'] = $code;
            $milestoneData['project_id'] = $projectId;
            $milestoneData['created_by'] = auth()->id();
            $milestoneData['updated_by'] = auth()->id();

            $milestone = Milestone::create($milestoneData);

            return response()->json([
                'success' => true,
                'data' => $milestone->load(['type', 'documents']),
                'message' => 'Hito creado exitosamente'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el hito',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $projectId, string $id): JsonResponse
    {
        try {
            $project = Project::find($projectId);

            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            $milestone = Milestone::with(['type', 'documents'])->where('project_id', $projectId)->find($id);

            if (!$milestone) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hito no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $milestone,
                'message' => 'Hito obtenido exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el hito',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, string $projectId, string $id): JsonResponse
    {
        try {
            $project = Project::find($projectId);

            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            $milestone = Milestone::where('project_id', $projectId)->find($id);

            if (!$milestone) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hito no encontrado'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'type_id' => 'sometimes|required|exists:milestone_types,id',
                'date' => 'sometimes|required|date',
                'title' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'responsible' => 'sometimes|required|string|max:255',
                'participants' => 'nullable|array',
                'participants.*' => 'string|max:255',
                'notes' => 'nullable|string',
                'state' => 'sometimes|string|in:pending,in_progress,completed,cancelled',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $milestoneData = $request->all();
            $milestoneData['updated_by'] = auth()->id();

            $milestone->update($milestoneData);

            return response()->json([
                'success' => true,
                'data' => $milestone->load(['type', 'documents']),
                'message' => 'Hito actualizado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el hito',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $projectId, string $id): JsonResponse
    {
        try {
            $project = Project::find($projectId);

            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            $milestone = Milestone::where('project_id', $projectId)->find($id);

            if (!$milestone) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hito no encontrado'
                ], 404);
            }

            $milestone->delete();

            return response()->json([
                'success' => true,
                'message' => 'Hito eliminado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el hito',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateState(Request $request, string $projectId, string $id): JsonResponse
    {
        try {
            $project = Project::find($projectId);

            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            $milestone = Milestone::where('project_id', $projectId)->find($id);

            if (!$milestone) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hito no encontrado'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'state' => 'required|string|in:pending,in_progress,completed,cancelled',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $milestone->update([
                'state' => $request->state,
                'updated_by' => auth()->id()
            ]);

            return response()->json([
                'success' => true,
                'data' => $milestone->load(['type', 'documents']),
                'message' => 'Estado del hito actualizado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el estado del hito',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getTypes(): JsonResponse
    {
        try {
            $types = \App\Models\MilestoneType::active()->orderBy('name')->get();

            return response()->json([
                'success' => true,
                'data' => $types,
                'message' => 'Tipos de hitos obtenidos exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los tipos de hitos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function statistics(string $projectId): JsonResponse
    {
        try {
            $project = Project::find($projectId);

            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Proyecto no encontrado'
                ], 404);
            }

            $totalMilestones = $project->milestones()->count();
            $completedMilestones = $project->milestones()->where('state', 'completed')->count();
            $inProgressMilestones = $project->milestones()->where('state', 'in_progress')->count();
            $pendingMilestones = $project->milestones()->where('state', 'pending')->count();

            $milestonesByType = $project->milestones()
                ->selectRaw('milestone_types.name, milestone_types.color, COUNT(milestones.id) as count')
                ->join('milestone_types', 'milestones.type_id', '=', 'milestone_types.id')
                ->groupBy('milestone_types.id', 'milestone_types.name', 'milestone_types.color')
                ->get();

            $milestonesByState = $project->milestones()
                ->selectRaw('state, COUNT(id) as count')
                ->groupBy('state')
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'total' => $totalMilestones,
                    'completed' => $completedMilestones,
                    'in_progress' => $inProgressMilestones,
                    'pending' => $pendingMilestones,
                    'by_type' => $milestonesByType,
                    'by_state' => $milestonesByState,
                ],
                'message' => 'Estadísticas de hitos obtenidas exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las estadísticas de hitos',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}