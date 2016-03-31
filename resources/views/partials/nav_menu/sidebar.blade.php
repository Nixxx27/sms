<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<script>
    (function($){
        $(document).ready(function(){

            $('#cssmenu li.active').addClass('open').children('ul').show();
            $('#cssmenu li.has-sub>a').on('click', function(){
                $(this).removeAttr('href');
                var element = $(this).parent('li');
                if (element.hasClass('open')) {
                    element.removeClass('open');
                    element.find('li').removeClass('open');
                    element.find('ul').slideUp(200);
                }
                else {
                    element.addClass('open');
                    element.children('ul').slideDown(200);
                    element.siblings('li').children('ul').slideUp(200);
                    element.siblings('li').removeClass('open');
                    element.siblings('li').find('li').removeClass('open');
                    element.siblings('li').find('ul').slideUp(200);
                }
            });

        });
    })(jQuery);

</script>


<div class="collapse navbar-collapse navbar-ex1-collapse " >
    <ul class="nav navbar-nav side-nav">
        <div id='cssmenu'>
            <div style="height:4px;background-color:#CE352C"> </div>
            <ul>
                <li class='active'><a href='{{ $project_name }}/home'><i class="fa fa-home"></i> <span class="mif-ani-hover-heartbeat mif-ani-slow"> Home </span></a></li>
                <li class='has-sub'><a href='#'><i class="fa fa-list"></i> <span class="mif-ani-hover-heartbeat mif-ani-slow"> items</span></a>
                    <ul>
                        <li><a href='{{ url('/items') }}'><span><i class="fa fa-caret-right"></i> Item Lists</span></a></li>
                        <li><a href='{{ url('/return') }}'><i class="fa fa-caret-right"></i> Returned Items</span></a></li>
                        <li><a href='{{ url('/lost') }}'><i class="fa fa-caret-right"></i> Lost Items</span></a></li>
                        <li><a href='{{ url('/items/create') }}'><span><i class="fa fa-caret-right"></i> Add Item</span></a></li>
                    </ul>
                </li>
                
                <li><a href='{{ url('/borrow') }}'><i class="fa fa-file-text-o"></i> <span class="mif-ani-hover-heartbeat mif-ani-slow">Borrowed Lists</span></a></li>
                <li><a href='{{ url('/reserve') }}'><i class="fa fa-file-text"></i> <span class="mif-ani-hover-heartbeat mif-ani-slow">Reserved Lists</span></a></li>

                <li class='has-sub'><a href='#'><i class="fa fa-cog"></i> <span class="mif-ani-hover-heartbeat mif-ani-slow"> Settings</span></a>
                    <ul>
                        <li><a href='{{ url('/desc') }}'><span><i class="fa fa-arrow-right"></i> Item Description</span></a></li>
                        <li class='last'><a href='{{ url('/category') }}'><span><i class="fa fa-arrow-right"></i> Category</span></a></li>
                        {{--<li class='last'><a href='{{ url('/serial') }}'><span><i class="fa fa-arrow-right"></i> Serial</span></a></li>--}}
                    </ul>
                </li>
            </ul>
        </div>

    </ul>

</div>

