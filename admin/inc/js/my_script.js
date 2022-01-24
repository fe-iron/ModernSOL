var count = 0;
var count_modal = 0;
var text = '';

var mon_flag = false;
var tues_flag = false;
var wed_flag = false;
var thurs_flag = false;
var fri_flag = false;
var sat_flag = false;
var sun_flag = false;

var mon_flag_modal = false;
var tues_flag_modal = false;
var wed_flag_modal = false;
var thurs_flag_modal = false;
var fri_flag_modal = false;
var sat_flag_modal = false;
var sun_flag_modal = false;

function add_batch_time(val){
    
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


function add_batch_time_modal(val){
    
    if(count_modal <= 7){
        if(val == "monday"){
            if(mon_flag_modal){
                document.getElementById('batch_div_mon_modal').style.display="none";
                mon_flag_modal = false
                count_modal -= 1;
            }else{
                document.getElementById('batch_div_mon_modal').style.display="block";
                mon_flag_modal = true;
                count_modal += 1;
            }
        }else if(val == "tuesday"){
            if(tues_flag_modal){
                document.getElementById('batch_div_tues_modal').style.display="none";
                tues_flag_modal = false;
                count_modal -= 1;
            }else{
                document.getElementById('batch_div_tues_modal').style.display="block";
                tues_flag_modal = true;
                count_modal += 1;
            }
        }else if(val == "wednesday"){
            if(wed_flag_modal){
                document.getElementById('batch_div_wed_modal').style.display="none";
                wed_flag_modal = false
                count_modal -= 1;
            }else{
                document.getElementById('batch_div_wed_modal').style.display="block";
                wed_flag_modal = true;
                count_modal += 1;
            }
        }else if(val == "thursday"){
            if(thurs_flag_modal){
                document.getElementById('batch_div_thurs_modal').style.display="none";
                thurs_flag_modal = false
                count_modal -= 1;
            }else{
                document.getElementById('batch_div_thurs_modal').style.display="block";
                thurs_flag_modal = true;
                count_modal += 1;
            }
        }else if(val == "friday"){
            if(fri_flag_modal){
                document.getElementById('batch_div_fri_modal').style.display="none";
                fri_flag_modal = false
                count_modal -= 1;
            }else{
                document.getElementById('batch_div_fri_modal').style.display="block";
                fri_flag_modal = true;
                count_modal += 1;
            }
        }else if(val == "saturday"){
            if(sat_flag_modal){
                document.getElementById('batch_div_sat_modal').style.display="none";
                sat_flag_modal = false
                count_modal -= 1;
            }else{
                document.getElementById('batch_div_sat_modal').style.display="block";
                sat_flag_modal = true;
                count_modal += 1;
            }
        }else if(val == "sunday"){
            if(sun_flag_modal){
                document.getElementById('batch_div_sun_modal').style.display="none";
                sun_flag_modal = false
                count_modal -= 1;
            }else{
                document.getElementById('batch_div_sun_modal').style.display="block";
                sun_flag_modal = true;
                count_modal += 1;
            }
        }
    }
}