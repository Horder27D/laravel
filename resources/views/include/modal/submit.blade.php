@php
    $modallable="Label".$modalid;
@endphp
<div class="modal fade" id="{{$modalid}}" tabindex="-1" role="dialog" aria-labelledby="{{$modallable}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{$modallable}}">{{$modaltitle}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!!nl2br($modalbody)!!}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary">Подтвердить</button>
            </div>
        </div>
    </div>
</div>