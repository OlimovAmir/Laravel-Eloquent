<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

/**
 * 
 * @OA\Info(
 *     title = "My Doc API",
 *     version = "1.0.0",
 *     description = "Описание API"
 * ),
 * 
 * @OA\PathItem(
 *     path="/api/"
 * ),
 * 
 */
class EmployeeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/employees",
     *      operationId="getEmployees",
     *      tags={"Employees"},
     *      summary="Список сотрудников",
     *      description="Получить список всех сотрудников",
     *      @OA\Response(
     *          response=200,
     *          description="Список сотрудников",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="name", type="string", example="Some title"),
     *                  @OA\Property(property="last_name", type="string", example="Some title"),
     *                  @OA\Property(property="patronymic", type="string", example="Some title"),
     *                  @OA\Property(property="position_id", type="integer", example=10),
     *                  @OA\Property(property="address_id", type="integer", example=10),
     *                  @OA\Property(property="passport_data", type="string", example="Some title"),
     *                  @OA\Property(property="photo_path", type="string", example="Some title"),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Ресурс не найден"
     *      ),
     * )
     * 
     */
    public function index()
    {
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Schema(
     *     schema="ValidationError",
     *     title="Validation Error",
     *     description="Схема ошибок валидации",
     *     @OA\Property(property="message", type="string", example="Ошибка валидации"),
     *     @OA\Property(property="errors", type="object",
     *         @OA\Property(property="field_name", type="array",
     *             @OA\Items(type="string", example="Ошибка валидации для поля")
     *         )
     *     )
     * )
     * 
     * @OA\Schema(
     *     schema="EmployeeResource",
     *     title="Employee Resource",
     *     description="Схема данных для сотрудника",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="name", type="string", example="John"),
     *     @OA\Property(property="last_name", type="string", example="Doe"),
     *     @OA\Property(property="patronymic", type="string", example="Smith"),
     *     @OA\Property(property="position_id", type="integer", example=1),
     *     @OA\Property(property="address_id", type="integer", example=2),
     *     @OA\Property(property="passport_data", type="string", example="123456789"),
     *     @OA\Property(property="photo_path", type="string", example="path/to/photo.jpg")
     * )
     * 
     * @OA\Post(
     *      path="/api/employees",
     *      operationId="storeEmployee",
     *      tags={"Employees"},
     *      summary="Создать сотрудника",
     *      description="Создать нового сотрудника",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string", example="John"),
     *              @OA\Property(property="last_name", type="string", example="Doe"),
     *              @OA\Property(property="patronymic", type="string", example="Smith"),
     *              @OA\Property(property="position_id", type="integer", example=1),
     *              @OA\Property(property="address_id", type="integer", example=2),
     *              @OA\Property(property="passport_data", type="string", example="123456789"),
     *              @OA\Property(property="photo_path", type="string", example="path/to/photo.jpg")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Сотрудник создан успешно",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Сотрудник успешно создан"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/EmployeeResource")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Неверные данные",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Ошибка валидации"),
     *              @OA\Property(property="errors", type="object", ref="#/components/schemas/ValidationError")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Не авторизован"
     *      ),
     *      security={
     *          {"BearerAuth": {}}
     *      }
     * )
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $employee = Employee::create($data);
        return EmployeeResource::make($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
