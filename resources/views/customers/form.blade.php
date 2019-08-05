<div class="form-group">
  <label for="name">Name</label>
  <input class="form-control" id="name" type="text" name="name" value=" {{ old('name') ?? $customer->name}}">
</div>
@if($errors->has('name'))
<div class="alert alert-danger" role="alert" style="margin-top:10px">
  {{ $errors->first('name') }}
</div>
@endif

<div class="form-group">
  <label for="email">Email</label>
  <input class="form-control" id="email" type="email" name="email" value=" {{ old('email') ?? $customer->email }} ">
</div>
@if($errors->has('email'))
<div class="alert alert-danger" role="alert" style="margin-top:10px">
  {{ $errors->first('email') }}
</div>
@endif

<div class="form-group">
  <label for="active">Select Customer List</label>
  <select class="form-control" id="active" name="active">
    @foreach($customer->activeOption() as $activeOptionKey => $activeOptionValue)
    <option value="{{$activeOptionKey}}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}> {{ $activeOptionValue }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="company_id">Select Company</label>
  <select class="form-control" id="company_id" name="company_id">
    @foreach($companies as $company)
    <option value=" {{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : ''}}>{{ $company->name }}</option>
    @endforeach
  </select>
</div>