<select required id="module_id" name="module_name" class="form-control">
    <option value=""></option>
    @foreach($softwareLinkModules as $softwareLinkModule)
    <option value="{{$softwareLinkModule->id}}">{{$softwareLinkModule->module_name}}</option>
    @endforeach
</select>
