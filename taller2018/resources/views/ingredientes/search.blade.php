<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 11/11/18
 * Time: 08:20 PM
 */
?>
{!! Form::open(array('url'=>'/ingredients','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}
<section>
    <div class="col-md-6">
        <div class="input-group">
            <input class="form-control" name="searchText" placeholder="Buscar..." style="padding: 5px" type="text" value="{{$searchText}}">
            <span class="input-group-btn">
                    <button type="submit" rel="tooltip" class="btn btn-primary btn-sm" title="Buscar Tipo">
                        <i class="material-icons">search</i>
                    </button>
                </span>
            </input>
        </div>
    </div>
</section>
{{Form::close()}}
