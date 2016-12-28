<div id="user-info-box" class="row container">
        <div id="pic-name" class="white-box row">
            <div id="user-info">
                <!--Profile Picture-->
                <div id = "profile-pic" class="white-box row">
                    @if(Auth::user()->profile_picture)
                        <img src="{{ Auth::user()->profile_picture }}" 
                        style = "width:100px; height:100px; border-radius:100px;">
                    @else
                        <img src="{{ URL::asset('/') }}images/default_profile.jpg">
                    @endif
                </div>
                <!--User Information{Name, Nickname, Age, Gender}-->
                
                <div id = "user-info" class="row">
                    <h4>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h4>
                    <h4 id="Nickname" style="color: rgba(79,79,79,0.8)"> {{Auth::user()->nickname}}</h4>
                </div>
             
            </div>
        </div>
        <!--{Number of Friends} {Number of Requests}-->
        <div id = "connections" class="row" >
            <div class="col-md-6 white-box "style="padding-top:18px; height:70px; width: 135px;">
                <h4 style="font-size: 15px">{{count(Auth::user()->friends)}} Friends</h4>
            </div> 
            <div class="col-md-6 white-box" style="padding-top:18px; height:70px; width: 135px; margin-left:10px;">
                <h4 style="font-size: 15px; ">{{count(Auth::user()->requests)}} Requests</h4>
            </div> 
            
        </div>
</div>
