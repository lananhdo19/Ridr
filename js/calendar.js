window.onload = function(){
    var d = new Date();
    var month_name = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    var month = d.getMonth();   //0-11
    var year = d.getFullYear(); //2020
    var first_date = month_name[month] + " " + 1 + " " + year;
    //February 1 2020
    var tmp = new Date(first_date).toDateString();
    //Sat Feb 01 2020 (first day of current month))
    var first_day = tmp.substring(0, 3);    //Sat
    var day_name = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    var day_no = day_name.indexOf(first_day);   //1
    var days = new Date(year, month+1, 0).getDate();    //29
    //Tue Feb 29 2020 (last day of current month)
    var calendar = get_calendar(day_no, days, month, year);
    document.getElementById("calendar-month-year").innerHTML = month_name[month] + " " + year;
    document.getElementById("calendar-dates").appendChild(calendar);

    //previous month
    document.getElementById("btnPrevMonth").onclick = function() {
        var curr_month = month; 
        var curr_year = year;
        if (month == 0) {
            curr_month = 11;
            curr_year--;
        } else {
            curr_month--;
        }
        document.getElementById("calendar-month-year").innerHTML = month_name[curr_month] + " " + curr_year;
        month = curr_month;
        year = curr_year;

        var first_date = month_name[month] + " " + 1 + " " + year;
        var tmp = new Date(first_date).toDateString();
        var first_day = tmp.substring(0, 3);    //Sat
        var day_no = day_name.indexOf(first_day);   //1
        var days = new Date(year, month+1, 0).getDate();    //29
        var calendar = get_calendar(day_no, days, month, year);
        var prev = document.getElementById("calendar-dates").appendChild(calendar);
        prev.previousSibling.remove();

    };

    //next month
    document.getElementById("btnNextMonth").onclick = function() {
        var curr_month = month; 
        var curr_year = year;
        if (month == 11) {
            curr_month = 0;
            curr_year++;
        } else {
            curr_month++;
        }
        document.getElementById("calendar-month-year").innerHTML = month_name[curr_month] + " " + curr_year;
        month = curr_month;
        year = curr_year;

        var first_date = month_name[month] + " " + 1 + " " + year;
        var tmp = new Date(first_date).toDateString();
        var first_day = tmp.substring(0, 3);    //Sat
        var day_no = day_name.indexOf(first_day);   //1
        var days = new Date(year, month+1, 0).getDate();    //29
        var calendar = get_calendar(day_no, days, month, year);
        var next = document.getElementById("calendar-dates").appendChild(calendar);
        next.previousSibling.remove();
    };
}


function get_calendar(day_no, days, month, year){
    var table = document.createElement('table');
    var tr = document.createElement('tr');
    var todaysDate = new Date();
    
    //row for the day letters
    for(var c=0; c<=6; c++){
        var td = document.createElement('td');
        td.innerHTML = "SMTWTFS"[c];
        tr.appendChild(td);
    }
    table.appendChild(tr);
    
    //create 2nd row
    tr = document.createElement('tr');
    var c;
    for(c=0; c<=6; c++){
        if(c == day_no){
            break;
        }
        var td = document.createElement('td');
        td.innerHTML = "";
        tr.appendChild(td);
    }
    
    var count = 1;
    for(; c<=6; c++){
        var td = document.createElement('td');
        //added it
        if (count == todaysDate.getDate() && month == todaysDate.getMonth() && year == todaysDate.getFullYear()) {
            td.className = 'today';
        }
        td.innerHTML = count;
        count++;
        tr.appendChild(td);
    }
    table.appendChild(tr);
    
    //rest of the date rows
    for(var r=3; r<=7; r++){
        tr = document.createElement('tr');
        for(var c=0; c<=6; c++){
            if(count > days){
                table.appendChild(tr);
                return table;
            }
            var td = document.createElement('td');
            if (count == todaysDate.getDate() && month == todaysDate.getMonth() && year == todaysDate.getFullYear()) {
                td.className = 'today';
            }
            td.innerHTML = count;
            count++;
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }
	return table;
}