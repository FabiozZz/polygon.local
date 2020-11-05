@php
/** @var \App\Models\Blog\BlogCategory $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div><br>
@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{$item->id}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Создано</label>
                        <input disabled type="text" id="title" value="{{$item->created_at}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <input disabled type="text" id="title" value="{{$item->updated_at}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Удалено</label>
                        <input disabled type="text" id="title" value="{{$item->deleted_at}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
