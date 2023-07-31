@extends('layouts.admin')

@section('title')
إضافة فئة صنف جديدة
@endsection

@section('Contentheader')
فئات الأصناف  
@endsection

@section('Contentheaderlink')
<a href="{{ route('inv_itemcard_categories.index') }}">  فئات الأصناف  </a>
@endsection

@section('Contentheaderactive')
إضافة
@endsection

@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title card_title_center">إضافة فئة صنف  جديدة</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <form action="{{ route('inv_itemcard_categories.store') }} " method="POST">
      @csrf
      
      
      <div class="form-group">
      <label>اسم الفئة </label>
      <input name="name" id="name" class="form-control" value="{{ old('name')}}" placeholder="ادخل اسم الفئة"  >
      @error('name')
      <span class="text-danger">{{ $message }}</span>
      @enderror  
      </div>

     
  
          <div class="form-group">
            <label>حالة التفعيل</label>
            <select name="active" id="active" class="form-control">
              <option value="">اختر الحالة</option>
              <option selected @if (old('active')==1)  selected="selected" @endif value="1">نعم مفعلة</option>
              <option @if(old('active')==0 and old('active')!="" ) selected="selected"  @endif value="0">لا غير مفعلة</option>
            </select>
            @error('active')
            <span class="text-danger">{{ $message }}</span>
            @enderror  
          </div>


          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-sm">إضافة </button>
          <a href="{{ route('inv_itemcard_categories.index') }}" class="btn btn-sm btn-danger">إلغاء</a>      
          </div>
            
              </form>  

          </div>  
        
  
    


      </div>
    </div>
  </div>
</div>
@endsection