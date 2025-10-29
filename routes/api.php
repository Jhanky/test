<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\PanelController;
use App\Http\Controllers\Api\InverterController;
use App\Http\Controllers\Api\BatteryController;
use App\Http\Controllers\Api\QuotationController;
use App\Http\Controllers\Api\QuotationStatusController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TaskEvidenceController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\MilestoneController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\StateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Rutas públicas (sin autenticación)
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

// Rutas protegidas (requieren autenticación)
Route::middleware('auth:sanctum')->group(function () {
    // Autenticación
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
        Route::get('/verify', [AuthController::class, 'verify']);
        Route::post('/register', [AuthController::class, 'register'])->middleware('permission:users.create');
    });

    // Gestión de Usuarios
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->middleware('permission:users.read');
        Route::get('/statistics', [UserController::class, 'statistics'])->middleware('permission:users.read');
        Route::get('/options', [UserController::class, 'options'])->middleware('permission:users.read');
        Route::get('/{id}', [UserController::class, 'show'])->middleware('permission:users.read');
        Route::post('/', [UserController::class, 'store'])->middleware('permission:users.create');
        Route::put('/{id}', [UserController::class, 'update'])->middleware('permission:users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->middleware('permission:users.delete');
        Route::patch('/{id}/toggle-status', [UserController::class, 'toggleStatus'])->middleware('permission:users.update');
    });

    // Gestión de Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->middleware('permission:roles.read');
        Route::get('/statistics', [RoleController::class, 'statistics'])->middleware('permission:roles.read');
        Route::get('/permissions', [RoleController::class, 'permissions'])->middleware('permission:roles.read');
        Route::get('/{id}', [RoleController::class, 'show'])->middleware('permission:roles.read');
        Route::post('/', [RoleController::class, 'store'])->middleware('permission:roles.create');
        Route::put('/{id}', [RoleController::class, 'update'])->middleware('permission:roles.update');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->middleware('permission:roles.delete');
        Route::patch('/{id}/toggle-status', [RoleController::class, 'toggleStatus'])->middleware('permission:roles.update');
    });

    // Gestión de Clientes
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->middleware('permission:commercial.read');
        Route::get('/statistics', [ClientController::class, 'statistics'])->middleware('permission:commercial.read');
        Route::get('/options', [ClientController::class, 'options'])->middleware('permission:commercial.read');
        Route::get('/{id}', [ClientController::class, 'show'])->middleware('permission:commercial.read');
        Route::post('/', [ClientController::class, 'store'])->middleware('permission:commercial.update');
        Route::put('/{id}', [ClientController::class, 'update'])->middleware('permission:commercial.update');
        Route::delete('/{id}', [ClientController::class, 'destroy'])->middleware('permission:commercial.update');
        Route::patch('/{id}/toggle-status', [ClientController::class, 'toggleStatus'])->middleware('permission:commercial.update');
    });
    
    // Gestión de Departamentos
    Route::apiResource('departments', DepartmentController::class);
    Route::get('departments/region/{region}', [DepartmentController::class, 'byRegion']);
    
    // Gestión de Ciudades
    Route::apiResource('cities', CityController::class);
    Route::get('cities/department/{departmentId}', [CityController::class, 'byDepartment']);

    // Gestión de Paneles
    Route::get('panels/statistics', [PanelController::class, 'statistics'])->middleware('permission:panels.read');
    Route::apiResource('panels', PanelController::class);
    Route::patch('panels/{id}/toggle-status', [PanelController::class, 'toggleStatus']);

    // Gestión de Inversores
    Route::get('inverters/statistics', [InverterController::class, 'statistics'])->middleware('permission:inverters.read');
    Route::apiResource('inverters', InverterController::class);
    Route::patch('inverters/{id}/toggle-status', [InverterController::class, 'toggleStatus']);

    // Gestión de Baterías
    Route::get('batteries/statistics', [BatteryController::class, 'statistics'])->middleware('permission:batteries.read');
    Route::apiResource('batteries', BatteryController::class);
    Route::patch('batteries/{id}/toggle-status', [BatteryController::class, 'toggleStatus']);

    // Gestión de Cotizaciones
    Route::apiResource('quotations', QuotationController::class);
    Route::patch('quotations/{quotation}/status', [QuotationController::class, 'updateStatus']);
    Route::get('quotations/statistics', [QuotationController::class, 'getStatistics']);
    Route::get('quotation-statuses', [QuotationController::class, 'getStatuses']);
    Route::get('quotations/{quotation}/pdf', [QuotationController::class, 'generatePDF']);
    Route::get('quotations/{quotation}/pdfkit', [QuotationController::class, 'generatePDFKit']);

    // Gestión de Estados de Cotizaciones
    Route::apiResource('quotation-statuses', QuotationStatusController::class);

    // Rutas de prueba
    Route::get('/health', function () {
        return response()->json([
            'success' => true,
            'message' => 'API funcionando correctamente',
            'timestamp' => now(),
            'version' => '1.0.0'
        ]);
    });

    // Gestión de Tareas
    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->middleware('permission:tasks.read');
        Route::get('/statistics', [TaskController::class, 'statistics'])->middleware('permission:tasks.read');
        Route::get('/my-tasks', [TaskController::class, 'myTasks'])->middleware('permission:tasks.read');
        Route::get('/{id}', [TaskController::class, 'show'])->middleware('permission:tasks.read');
        Route::post('/', [TaskController::class, 'store'])->middleware('permission:tasks.create');
        Route::put('/{id}', [TaskController::class, 'update'])->middleware('permission:tasks.update');
        Route::patch('/{id}/status', [TaskController::class, 'updateStatus'])->middleware('permission:tasks.update');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->middleware('permission:tasks.delete');
    });

    // Gestión de Evidencias de Tareas
    Route::prefix('task-evidences')->group(function () {
        Route::get('/task/{taskId}', [TaskEvidenceController::class, 'index']);
        Route::get('/{evidenceId}', [TaskEvidenceController::class, 'show']);
        Route::get('/{evidenceId}/url', [TaskEvidenceController::class, 'getFileUrl']);
        Route::post('/task/{taskId}', [TaskEvidenceController::class, 'store']);
        Route::delete('/{taskId}/{evidenceId}', [TaskEvidenceController::class, 'destroy']);
    });

    // Gestión de Proyectos
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->middleware('permission:projects.read');
        Route::get('/statistics', [ProjectController::class, 'statistics'])->middleware('permission:projects.read');
        Route::get('/{id}', [ProjectController::class, 'show'])->middleware('permission:projects.read');
        Route::post('/', [ProjectController::class, 'store'])->middleware('permission:projects.create');
        Route::put('/{id}', [ProjectController::class, 'update'])->middleware('permission:projects.update');
        Route::patch('/{id}/state', [ProjectController::class, 'updateState'])->middleware('permission:projects.update');
        Route::delete('/{id}', [ProjectController::class, 'destroy'])->middleware('permission:projects.delete');

        // Rutas de hitos (milestones) para cada proyecto
        Route::prefix('{project}/milestones')->group(function () {
            Route::get('/', [MilestoneController::class, 'index'])->middleware('permission:projects.read');
            Route::get('/statistics', [MilestoneController::class, 'statistics'])->middleware('permission:projects.read');
            Route::get('/types', [MilestoneController::class, 'getTypes'])->middleware('permission:projects.read');
            Route::get('/{id}', [MilestoneController::class, 'show'])->middleware('permission:projects.read');
            Route::post('/', [MilestoneController::class, 'store'])->middleware('permission:projects.create');
            Route::put('/{id}', [MilestoneController::class, 'update'])->middleware('permission:projects.update');
            Route::patch('/{id}/state', [MilestoneController::class, 'updateState'])->middleware('permission:projects.update');
            Route::delete('/{id}', [MilestoneController::class, 'destroy'])->middleware('permission:projects.delete');
        });

        // Rutas de documentos para cada proyecto
        Route::prefix('{project}/documents')->group(function () {
            Route::get('/', [DocumentController::class, 'index'])->middleware('permission:projects.read');
            Route::get('/statistics', [DocumentController::class, 'statistics'])->middleware('permission:projects.read');
            Route::get('/types', [DocumentController::class, 'getTypes'])->middleware('permission:projects.read');
            Route::get('/{id}', [DocumentController::class, 'show'])->middleware('permission:projects.read');
            Route::post('/', [DocumentController::class, 'store'])->middleware('permission:projects.create');
            Route::post('/multiple', [DocumentController::class, 'multipleUpload'])->middleware('permission:projects.create');
            Route::put('/{id}', [DocumentController::class, 'update'])->middleware('permission:projects.update');
            Route::delete('/{id}', [DocumentController::class, 'destroy'])->middleware('permission:projects.delete');
            Route::get('/{id}/download', [DocumentController::class, 'download'])->middleware('permission:projects.read');

            // Rutas de documentos para hitos específicos
            Route::prefix('milestone/{milestone}')->group(function () {
                Route::get('/', [DocumentController::class, 'indexByMilestone'])->middleware('permission:projects.read');
                Route::post('/', [DocumentController::class, 'storeForMilestone'])->middleware('permission:projects.create');
            });
        });
    });

    // Gestión de Estados y Tipos
    Route::prefix('states')->group(function () {
        Route::get('/', [StateController::class, 'getProjectStates'])->middleware('permission:projects.read');
        Route::get('/{id}', [StateController::class, 'getProjectState'])->middleware('permission:projects.read');
        Route::post('/', [StateController::class, 'createProjectState'])->middleware('permission:projects.create');
        Route::put('/{id}', [StateController::class, 'updateProjectState'])->middleware('permission:projects.update');
        Route::delete('/{id}', [StateController::class, 'deleteProjectState'])->middleware('permission:projects.delete');
        
        Route::get('/milestone-types', [StateController::class, 'getMilestoneTypes'])->middleware('permission:projects.read');
        Route::get('/document-types', [StateController::class, 'getDocumentTypes'])->middleware('permission:projects.read');
        Route::get('/statistics', [StateController::class, 'statistics'])->middleware('permission:projects.read');
        
        // Rutas específicas para proyectos
        Route::get('/projects/{project}/timeline', [StateController::class, 'getProjectStateTimeline'])->middleware('permission:projects.read');
        Route::get('/projects/{project}/available-transitions/{currentStateId}', [StateController::class, 'getAvailableStateTransitions'])->middleware('permission:projects.read');
        Route::post('/projects/{project}/validate-state-transition', [StateController::class, 'validateStateTransition'])->middleware('permission:projects.read');
    });
});

// Ruta de prueba para verificar conectividad
Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'message' => 'API funcionando correctamente',
        'timestamp' => now(),
        'version' => '1.0.0'
    ]);
});
