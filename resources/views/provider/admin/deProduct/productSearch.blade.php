<select required name="item[]" id="product_id" data-fv-row=".col-sm-9" data-fv-icon="false" class="select2 form-control adv-search product_select">
    <option value="">Select Product</option>
    @foreach ($productSearch as $item)
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
</select>