<div class="subtitle">
    <div class="close_form"><span>x</span></div>
    <div class="row pt-4 pb-4 ">
        <div class="col-12">
        <div class="alterSuccessletter">

            </div>
            <form id="submitformsubtitle" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">sub title</label>
                    <input type="text" id="subtitle" name="subtitle" value="{{old('subtitle')}}" class="form-control">
                </div>
                <input type="hidden" id="title_id" name="title_id" class="form-control">
                <button type="submit" class="btn btn-primary">create</button>
            </form>
        </div>
    </div>
</div>