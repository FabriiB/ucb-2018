<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 24/10/18
 * Time: 12:10 AM
 */
?>
{!! Form::open(array('url'=>'/recipe','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<section>
    <div class="col-md-5">
        <div class="input-group">
            <input class="form-control" name="searchText" placeholder="Search..." style="padding: 5px" type="text" value="{{$searchText}}">
            <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        Search
                    </button>
                </span>
            </input>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
</section>
{{Form::close()}}
