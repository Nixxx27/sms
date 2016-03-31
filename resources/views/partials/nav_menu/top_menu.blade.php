<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
     <li class="dropdown">
        <a href="#" id="clockbox"></a>
    </li>


    <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown" block-shadow-info loading-pulse><i class="fa fa-user "></i>  {{ ucwords( Auth::user()->name ) }} <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li class="divider"></li>
            <li>
                <a href="logout" onclick="return confirm('Are you sure you want to Log-out?')"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>

<script>
    tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

    function GetClock(){
        var d=new Date();
        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
        if(nyear<1000) nyear+=1900;
        var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

        if(nhour==0){ap=" AM";nhour=12;}
        else if(nhour<12){ap=" AM";}
        else if(nhour==12){ap=" PM";}
        else if(nhour>12){ap=" PM";nhour-=12;}

        if(nmin<=9) nmin="0"+nmin;
        if(nsec<=9) nsec="0"+nsec;

        document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
    }

    window.onload=function(){
        GetClock();
        setInterval(GetClock,1000);
    }
</script>