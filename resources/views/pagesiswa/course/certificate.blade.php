<div style="background-color:seashell;width:1000px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <!-- div di bawah ini kasi style position: relative -->
    <div style="position: relative; width:950px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
        <!-- div dan img di bawah ini kasi style kayak yg tak kasi -->
        <div style="top: 0; left: 0; justify-content: center; align-items: center; position: absolute; width: 990px; height: 590px;">
                <img style="opacity: 0.3;" src="{{asset('images/course/certificate-1137087_1280.png')}}" alt="" width="990px" height="590px">
        </div>
        <span style="font-family:Lucida Calligraphy; font-size:50px; font-weight:bold">Certificate </span><br>
        <div style="font-family:Lucida Calligraphy; font-size:30px; font-weight:bold">OF Completion</div>
        <br><br>
        <span style="font-size:25px"><i>This is to certify that</i></span>
        <br><br>
        <span style="font-family:Arial; font-size:30px"><b>{{$name}}</b></span><br/><br/>
        <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
        <span style="font-family:Arial; font-size:30px"><b>{{$course}}</b></span> <br/><br/>
        <span style="font-size:25px"><i>dated</i></span><br>
        <span style="font-family:Arial; font-size:20px">{{$date}}</span><br><br><br><br>

        <span style="font-size:25px">Powered By</span><br>
        <span style="font-family:Arial; font-size:25px"><b>Yayasan Kampus Amerta Bakti</b></span>
    </div>
</div>