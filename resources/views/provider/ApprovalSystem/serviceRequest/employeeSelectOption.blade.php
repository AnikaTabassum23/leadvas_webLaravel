@if (count($employees) > 0)
<select name="employee_id" id="employee_id" data-fv-icon="false" class="select2 form-control ml0">
    <option value="">Select One</option>
    @foreach ($employees as $employee)
        <option value="{{$employee->id}}">{{$employee->name}}</option>
    @endforeach
</select>
@endif
