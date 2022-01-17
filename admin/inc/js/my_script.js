var count = 0;
var text = '';
var mon_flag = false;
var tues_flag = false;
var wed_flag = false;
var thurs_flag = false;
var fri_flag = false;
var sat_flag = false;
var sun_flag = false;

function add_batch_time(val){
    console.log(val);
    
    if(count <= 7){
        if(val == "monday"){
            if(mon_flag){
                document.getElementById('batch_div_mon').style.display="none";
                mon_flag = false
                count -= 1;
            }else{
                document.getElementById('batch_div_mon').style.display="block";
                mon_flag = true;
                count += 1;
            }
        }else if(val == "tuesday"){
            if(tues_flag){
                document.getElementById('batch_div_tues').style.display="none";
                tues_flag = false;
                count -= 1;
            }else{
                document.getElementById('batch_div_tues').style.display="block";
                tues_flag = true;
                count += 1;
            }
        }else if(val == "wednesday"){
            if(wed_flag){
                document.getElementById('batch_div_wed').style.display="none";
                wed_flag = false
                count -= 1;
            }else{
                document.getElementById('batch_div_wed').style.display="block";
                wed_flag = true;
                count += 1;
            }
        }else if(val == "thursday"){
            if(thurs_flag){
                document.getElementById('batch_div_thurs').style.display="none";
                thurs_flag = false
                count -= 1;
            }else{
                document.getElementById('batch_div_thurs').style.display="block";
                thurs_flag = true;
                count += 1;
            }
        }else if(val == "friday"){
            if(fri_flag){
                document.getElementById('batch_div_fri').style.display="none";
                fri_flag = false
                count -= 1;
            }else{
                document.getElementById('batch_div_fri').style.display="block";
                fri_flag = true;
                count += 1;
            }
        }else if(val == "saturday"){
            if(sat_flag){
                document.getElementById('batch_div_sat').style.display="none";
                sat_flag = false
                count -= 1;
            }else{
                document.getElementById('batch_div_sat').style.display="block";
                sat_flag = true;
                count += 1;
            }
        }else if(val == "sunday"){
            if(sun_flag){
                document.getElementById('batch_div_sun').style.display="none";
                sun_flag = false
                count -= 1;
            }else{
                document.getElementById('batch_div_sun').style.display="block";
                sun_flag = true;
                count += 1;
            }
        }
    }
}