<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="search_key" id="search_key" class="form-control" placeholder="Search product by name" />
                </div>
                <div class="col-md-4">
                    <button class="btn btn-warning btn-sm" id="searchBtn">Search</button>
                    <button class="btn btn-info btn-sm" id="resetBtn">Reset</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="ajaxContent"></div>
        </div>
    </div>
</div>