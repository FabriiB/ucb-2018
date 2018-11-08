<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 6/11/18
 * Time: 08:56 PM
 */
?>
{!! Form::open(array('url'=>'/menu','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<section>
    <div class="col-md-5">
        <div class="input-group">
            <input class="form-control" name="searchText" placeholder="Search..." style="padding: 5px" type="text" >
            <span class="input-group-btn">
                    <button class="btn btn-primary btn-sm" type="submit">
                        Search
                    </button>
                </span>
            </input>
        </div>
    </div>
</section>
{{Form::close()}}

