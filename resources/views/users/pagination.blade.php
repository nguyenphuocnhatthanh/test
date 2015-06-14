
<div class="row content" id="users">
    @if(Request::has('search'))
        {{--{{var_dump(Request::get('search'))}}
        {{var_dump(Request::query())}}--}}
    @endif

    @foreach($users as $user)

        <p>Name: {!! HTML::linkAsset('users/edit/'.$user->id, $user->username) !!} </p>
        <p>Email: {{$user->email}}</p>
        <hr/>
    @endforeach
    <div class="col-md-12 text-center">
        <div id="system-pagination">
            <ul class="pagination" id="pagination">

                {{--Nếu page bé hơn hoặc = 1--}}
                @if ($users->currentPage() <= 1)
                    <li class="disabled"><span>&laquo;</span></li>
                @else
                    <li><a href="<?= $users->setPath('')->appends(Request::query())->url(1) ?>">Đầu</a></li>
                @endif



                {{--Hiển thị nút lui--}}
                @if ($users->currentPage() <= 1)
                    <li class="disabled"><span>&lt;</span></li>
                @else
                    <li><a href="<?= $users->setPath('')->appends(Request::query())->url($users->currentPage() - 1) ?>">&lt;</a></li>
                @endif


                {{--Hiển thị page--}}
                @for($page = $users->pageMin(); $page <= $users->pageMax(); $page++)
                    @if ($users->currentPage() == $page)
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="<?= $users->setPath('')->appends(Request::query())->url($page) ?>">{{ $page }}</a></li>
                    @endif
                @endfor
                {{--Nếu page > tổng page--}}
                @if ($users->currentPage() >= $users->lastPage())
                    <li class="disabled"><span>&gt;</span></li>
                @else
                    <li><a href="<?= $users->setPath('')->appends(Request::query())->url($users->currentPage() + 1) ?>">&gt;</a></li>
                @endif

                @if ($users->currentPage() >= $users->lastPage())
                    <li class="disabled"><span>&raquo;</span></li>
                @else
                    <li><a href="<?= $users->setPath('')->url($users->lastPage()) ?>">Cuối</a></li>
                @endif

            </ul>
        </div>
    </div>
</div>

