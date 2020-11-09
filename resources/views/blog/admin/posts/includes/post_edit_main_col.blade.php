@php
    /** @var \App\Models\Blog\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required
                                   value="{{$item->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="20">{{old('content_raw',$item->content_raw)}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Выберете категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{$categoryOption->id_plus_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input type="text" value="{{$item->slug}}"
                                   name="slug"
                                   id="slug"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="except">Выдержка</label>
                            <textarea type="text"
                                      name="except"
                                      id="except"
                                      class="form-control">{{old('except',$item->except)}}</textarea>
                        </div>
                        <div class="form-check">
                            <input name="is_published"
                                   type="hidden"
                                   value="0">
                            <input name="is_published"
                                   id="is_published"
                                   value="{{$item->is_published}}"
                                   class="form-check-input"
                                   @if($item->is_published)
                                   checked="checked"
                                   @endif
                                   type="checkbox">
                            <label for="is_published" class="form-check-label">Опубликовано</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
