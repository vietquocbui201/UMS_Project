$(document).ready(function (){
    $('#project-table,#job-table,#rate-table,#gantt-table').css({
        width: $(window).width()/3
    });

    $('.resize-btn').click(function (){
        var size = parseInt($(this).attr("data-size"))+1;
        if (size == 3) size=1;
        var parent = "#"+$(this).attr("data-for");
        $(parent).css({
            width: size / 3 * $(window).width()
        });
        $(this).attr("data-size", size)
    });

    setInterval(function () {
        $('#project-table table thead, #job-table table thead, #rate-table table thead').css({
            height: $('#gantt-table table thead').height()
        });
        var n = $('#project-table table tbody tr').length;
        for (i = 0; i < n; i ++) {
            a = $('#project-table table tbody tr').eq(i);
            b = $('#job-table table tbody tr').eq(i);
            c = $('#rate-table table tbody tr').eq(i);
            d = $('#gantt-table table tbody tr').eq(i);
            e = $('#gantt-table');
            f = $('#box');
            compare_height(a, b);
            compare_height(a, c);
            compare_height(a, d);
            compare_height(b, c);
            compare_height(b, d);
            compare_height(c, d);
            compare_width(e,f);
        }
    },1000);
    compare_height = function(a, b) {
        atop = a.position().top;
        btop = b.position().top;
        aheight = a.height();
        bheight = b.height();
        if(atop + aheight > btop + bheight + 3) b.height(atop + aheight - btop);
        else if (atop + aheight + 3 < btop + bheight) a.height(btop + bheight - atop);
    }
    compare_width = function (a,b){
        apos = a.position();
        bpos = b.position();
        awidth = a.width();
        bwidth = b.width();
        adiv = apos.left + awidth;
        bdiv = bpos.left + bwidth;
        if (bdiv < adiv || bdiv > adiv + 10){

            b.width(adiv + 5)
        } else if (bdiv > adiv || bdiv < adiv + 10){
            b.width(adiv + 5 - bpos.left)
        }
    }

    $(".table-hideable .d-none").each(HideColumnIndex);
    $('.hide-column').click(HideColumnIndex);
    function HideColumnIndex() {
        var $el = $(this);
        var $cell = $el.closest('th,td')
        var $table = $cell.closest('table')
        var colIndex = $cell[0].cellIndex + 1;

        $table.find("tbody tr, thead tr").children(":nth-child(" + colIndex + ")").hide();
    }

    $(".restore-columns").click(function(e) {
        var $table = $('#j-table');
        $table.find("th, td").show();
    })
    $(".restore-pj-columns").click(function(e) {
        var $table = $('#pj-table');
        $table.find("th, td").show();
    })
    $(".restore-r-columns").click(function(e) {
        var $table = $('#r-table');
        $table.find("th, td").show();
    })

});