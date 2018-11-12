<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 10/11/18
 * Time: 01:07 PM
 */
?>
{!! Form::open(array('url'=>'/drink','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}
<section>
    <div class="col-md-6">
        <div class="input-group">
            <input class="form-control" name="searchText" placeholder="Buscar..." style="padding: 5px" type="text" value="{{$searchText}}">
                <span class="input-group-btn">
                    <button type="submit" rel="tooltip" class="btn btn-primary btn-sm">
                        <i class="material-icons">search</i>
                    </button>
                </span>
            </input>
        </div>
    </div>
</section>
{{Form::close()}}
