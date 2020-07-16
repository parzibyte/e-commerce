@if(!empty($errors->all()))
    <div class="alert alert-danger">
        <p>{{__("messages.please_validate")}}</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>
                    {{$message}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
