@if(Session::has('message'))
    <p>{{Session::get('message')}}</p>
@endif
ban da co kich thanh cong <br/>

Bam vao {!!HTML::link('auth/login')!!} de dang nhap