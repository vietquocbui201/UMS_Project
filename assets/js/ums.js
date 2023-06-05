$(document).ready(function () {

    var show_project = true;
    var show_gantt = true;
    var show_rate = true;
    var show_job = true;

    const container = document.querySelector('.mouse-scroll');

    container.addEventListener('wheel', (event) => {
        event.preventDefault();
        container.scrollLeft += event.deltaY;
    });

    var last_report;
    $('#project-table,#job-table,#rate-table,#gantt-table').css({
        width: $(window).width() / 3
    });

    $('.resize-btn').click(function () {
        $("table thead, table tbody tr").css({
            height: "fit-content"
        });
        var size = parseInt($(this).attr("data-size")) + 1;
        if (size == 5) size = 1;
        var parent = "#" + $(this).attr("data-for");
        $(parent).css({
            width: size / 4 * $(window).width()
        });
        $(this).attr("data-size", size)
    });

    $('.fit-content').on("click", function () {
        $("table thead, table tbody tr").css({
            width: "fit-content"
        });
    })

    setInterval(function () {
        $('#project-table table thead, #job-table table thead, #rate-table table thead').css({
            height: $('#gantt-table table thead').height()
        });
        var n = $('#project-table table tbody tr').length;
        e = $('#gantt-table');
        f = $('#box');
        if (show_gantt) {
            compare_width(e, f);
        }
        for (i = 0; i < n; i++) {
            a = $('#project-table table tbody tr').eq(i);
            b = $('#job-table table tbody tr').eq(i);
            c = $('#rate-table table tbody tr').eq(i);
            d = $('#gantt-table table tbody tr').eq(i);
            if (show_project && show_job) {
                compare_height(a, b);
            }
            if (show_project && show_rate) {
                compare_height(a, c);

            }
            if (show_project && show_gantt) {
                compare_height(a, d);
            }
            if (show_job && show_rate) {
                compare_height(b, c);

            }
            if (show_job && show_gantt) {
                compare_height(b, d);
            }
            if (show_rate && show_gantt) {
                compare_height(c, d);
            }
        }
    }, 1000);
    compare_height = function (a, b) {
        atop = a.position().top;
        btop = b.position().top;
        aheight = a.height();
        bheight = b.height();
        if (atop + aheight > btop + bheight + 3) b.height(atop + aheight - btop);
        else if (atop + aheight + 3 < btop + bheight) a.height(btop + bheight - atop);
    }
    compare_width = function (a, b) {
        apos = a.position();
        bpos = b.position();
        awidth = a.width();
        bwidth = b.width();
        adiv = apos.left + awidth;
        bdiv = bpos.left + bwidth;
        if (bdiv < adiv || bdiv > adiv + 10) {

            b.width(adiv + 5)
        } else if (bdiv > adiv || bdiv < adiv + 10) {
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

        $table.find("tbody tr, thead tr").children(":nth-child(" + colIndex + ")").each(function () {
            if (!$(this).hasClass("date-gantt-month")) {
                $(this).hide();
            }
        });
    }

    $(".hideSa").on('click', hideSa);

    function hideSa() {
        var columnsToHide = $("#gantt-table th:contains('Sa')");
        columnsToHide.each(function () {
            var columnIndex = $(this).index();
            $('#gantt-table table th:nth-child(' + (columnIndex + 1) + '),#gantt-table table td:nth-child(' + (columnIndex + 1) + ')').hide();
        });
    }


    $(".hideSu").on('click', hideSu);

    function hideSu() {
        var columnsToHide = $("#gantt-table th:contains('Su')");
        columnsToHide.each(function () {
            var columnIndex = $(this).index();
            $('#gantt-table table th:nth-child(' + (columnIndex + 1) + '),#gantt-table table td:nth-child(' + (columnIndex + 1) + ')').hide();
        });
    }


    function showAlert(text) {
        $('#myAlertsuccess').html(text).show(500).delay(3000).hide(500);
    }

    function ShowAlertDanger(text, delay = 3000) {
        $('#myAlertdanger').html(text).show(500).delay(delay).hide(500);
    }

    $(".restore-columns").click(function (e) {
        var $table = $($(this).attr("data-table")).find("th, td").show();
    })

    $('#pj-table td:has(.img-user)').on('mouseleave', function () {
        $(this).closest('td').find('#card-profile').addClass('d-none');
    });


    $(".view-report-job").on("click", function () {


        var job_id = $(this).parent().parent().attr('data-id');
        $('input[name="job_id"]').val(job_id);
        $('input[name="colum_data"]').val("report");
        var last_update_report_list = $("#last-update-report-job");
        last_update_report_list.children().each(function () {
            $(this).remove();
        })
        $.ajax({
            url: "action_processing/get_report_job.php",
            data: {
                bit: 1,
                job_id: job_id
            },
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                last_report = data;
                CKEDITOR.instances['ckeditor'].setData(data.rows[data.rows.length - 1].content.replaceAll("</ br>", '\n'));
                $.each(last_report.rows, function (index, value) {
                    var time = value.time;
                    var user = value.user;
                    var text = '<a data-time="' + time + '" href="#" class="list-group-item text-sm last-submit-report">' + user + ": " + time + '</a>';
                    last_update_report_list.prepend(text);
                });
            }
        })
        return false;
    });

    $(".view-assess").on("click", function () {
        var job_id = $(this).parent().parent().attr('data-id');
        $('input[name="job_id"]').val(job_id);
        $('input[name="colum_data"]').val("assess");
        var last_update_report_list = $("#last-update-report-job");
        last_update_report_list.children().each(function () {
            $(this).remove();
        })
        $.ajax({
            url: "action_processing/get_report_job.php",
            data: {
                bit: 2,
                job_id: job_id
            },
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                last_report = data;
                CKEDITOR.instances['ckeditor'].setData(data.rows[data.rows.length - 1].content.replaceAll("</ br>", '\n'));
                $.each(last_report.rows, function (index, value) {
                    var time = value.time;
                    var text = '<a data-time="' + time + '" href="#" class="list-group-item text-sm last-submit-report">' + time + '</a>';
                    last_update_report_list.prepend(text);
                });
            }
        })
        return false;
    });

    $(".view-experience").on("click", function () {
        var job_id = $(this).parent().parent().attr('data-id');
        $('input[name="job_id"]').val(job_id);
        $('input[name="colum_data"]').val("experience");
        var last_update_report_list = $("#last-update-report-job");
        last_update_report_list.children().each(function () {
            $(this).remove();
        })
        $.ajax({
            url: "action_processing/get_report_job.php",
            data: {
                bit: 3,
                job_id: job_id
            },
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                last_report = data;
                CKEDITOR.instances['ckeditor'].setData(data.rows[data.rows.length - 1].content.replaceAll("</ br>", '\n'));
                $.each(last_report.rows, function (index, value) {
                    var time = value.time;
                    var text = '<a data-time="' + time + '" href="#" class="list-group-item text-sm last-submit-report">' + time + '</a>';
                    last_update_report_list.prepend(text);
                });
            }
        })
        return false;
    });


    $('.view-report-job').on('mouseenter', function () {
        var job_id = $(this).parent().parent().attr('data-id');
        var $this = $(this);
        $.ajax({
            url: "action_processing/get_report_job.php",
            data: {
                bit: 1,
                job_id: job_id
            },
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                var lastContent = data.rows[data.rows.length - 1].content;
                $("#ckeditor2").html(lastContent);
                var view = $("#view-report").removeClass("d-none");
                $this.append(view);
            }
        })
    });

    $('.view-report-job').on('mouseleave', function () {
        $('#view-report').addClass('d-none');
    });


    $('#report_form').on("submit", function (e) {
        e.preventDefault();
        var project_id = $('input[name="project_id"]').val();
        var job_id = $('input[name="job_id"]').val();
        var user_id = $('input[name="user_create_report_job"]').val();
        var colum = $('input[name="colum_data"]').val();
        var ckeditor_value = CKEDITOR.instances['ckeditor'].getData().replaceAll('\n', "</ br>");
        $.ajax({
            url: "action_processing/add_report_job.php",
            data: {
                project_id: project_id,
                job_id: job_id,
                user_id: user_id,
                ckeditor_value: ckeditor_value,
                colum: colum
            },
            type: "POST",
            success: function () {
                showAlert("Đã cập nhật báo cáo thành công!!");
            }
        })
    });

    $("body").on("click", ".last-submit-report", function () {
        var time = $(this).attr('data-time');
        for (var i = 0; i < last_report.rows.length; i++) {
            var row = last_report.rows[i];
            if (row.time === time) {
                CKEDITOR.instances['ckeditor'].setData(row.content.replaceAll("</ br>", '\n'));
                $(this).siblings().removeClass("active");
                $(this).addClass("active");
            }
        }
        return false;
    });

    //get_code_video
    function getYoutubeEmbedCode(videoUrl) {
        var embedCode = "";
        var videoId = "";

        if (videoUrl.indexOf("watch?v=") > -1) {
            videoId = videoUrl.split("watch?v=")[1];
        } else if (videoUrl.indexOf("youtu.be/") > -1) {
            videoId = videoUrl.split("youtu.be/")[1];
        } else if (videoUrl.indexOf("embed/") > -1) {
            videoId = videoUrl.split("embed/")[1];
        } else if (videoUrl.indexOf("/live/") > -1) {
            videoId = videoUrl.split("/live/")[1].split("?")[0];
        }
        return videoId;
    }


    var job_id;
    var data_link_report;
    $(".view-link-report-job").on("click", function () {
        job_id = $(this).parent().parent().attr('data-id');
        var iframe = $("#video-list-iframe");
        iframe.children().each(function () {
            $(this).remove();
        });

        var link_list = $("#link-list");
        link_list.children().each(function () {
            $(this).remove();
        });

        var img_list = $("#img-list-iframe");
        img_list.children().each(function () {
            $(this).remove();
        });

        var file_list = $("#file-list");
        file_list.children().each(function () {
            $(this).remove();
        });


        $.ajax({
            url: "action_processing/get_report_job.php",
            data: {
                bit: 0,
                job_id: job_id
            },
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                data_link_report = data;
                $.each(data_link_report.video, function (index, value) {
                    var code = value;
                    text = '<div class="col-4">\n' +
                        '      <div class="position-relative mb-2">\n' +
                        '        <div class="embed-responsive embed-responsive-16by9" style="z-index: 2; border-radius: 15px">\n' +
                        '             <iframe class="video-replace" src="https://www.youtube.com/embed/' + code + '" frameborder="0" allowfullscreen></iframe>\n' +
                        '         </div>\n' +
                        '      </div>\n' +
                        '  </div>';
                    iframe.prepend(text);
                });

                $.each(data_link_report.link, function (index, value) {
                    var link = value;
                    text = '<li class=""><i\n' +
                        '      class="fa-solid fa-plus mx-2 text-warning"></i><a href="' + link + '">' + link + '</a>\n' +
                        '</li>';
                    link_list.prepend(text);
                });
                $.each(data_link_report.img, function (index, value) {
                    var img = value;
                    text = '<div class="col-2">\n' +
                        '       <div data-img="' + img + '" class="rounded shadow img-detail"\n' +
                        '          style="background-image: url(\'assets/images/' + img + '\');background-size: contain;background-repeat: no-repeat;background-position: center;height: 200px" href="#">\n' +
                        '       </div>\n' +
                        '   </div>';
                    img_list.prepend(text);
                });

                $.each(data_link_report.file, function (index, value) {
                    var file = value;
                    text = '<a href="assets/file/' + file + '" class="btn btn-light">\n' +
                        '       <i class="fa-solid fa-file fs-2"></i> ' + file + '\n' +
                        '   </a>';
                    file_list.prepend(text);
                });
            }
        })
        return false;
    });

    $("body").on("click", ".img-detail", function (e) {
        e.preventDefault();
        var name_img = $(this).attr('data-img');
        var modal = $('' +
            '<div class="modal fade">\n' +
            '    <div class="modal-dialog modal-lg">\n' +
            '       <div  class=""\n' +
            '          style="background-image: url(\'assets/images/' + name_img + '\');background-size: contain;background-repeat: no-repeat;background-position: center;height: 600px" href="#">\n' +
            '       </div>\n' +
            '    </div>\n' +
            '</div>\n');
        $('body').append(modal);
        modal.modal('show');
    })


    //upload video
    $("#add-video-button").click(function () {
        var modal = $('<div class="modal fade">\n' +
            '    <div class="modal-dialog">\n' +
            '        <div class="modal-content">\n' +
            '            <div class="modal-header"><h5 class="modal-title">Add Video Link</h5>\n' +
            '                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>\n' +
            '            </div>\n' +
            '            <div class="modal-body">\n' +
            '                <form>\n' +
            '                    <div class="form-group"><input type="text" class="form-control" name="video-link" placeholder="Enter video link">\n' +
            '                    </div>\n' +
            '                </form>\n' +
            '            </div>\n' +
            '            <div class="modal-footer">\n' +
            '                <button type="button" class="btn btn-primary" id="submit-link-video">Upload</button>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>\n');
        $('body').append(modal);
        modal.modal('show');
        $("#submit-link-video").on("click", function () {
            var video_link = $('input[name="video-link"]').val();
            var code = getYoutubeEmbedCode(video_link);
            $.ajax({
                url: "action_processing/upload_file_link_report.php",
                data: {
                    code: code,
                    job_id: job_id
                },
                type: "POST",
                success: function () {
                    showAlert("Upload video thành công!!");
                }
            })
        })
    });

    //upload link
    $("#add-link-button").click(function () {
        var modal = $('<div class="modal fade">\n' +
            '    <div class="modal-dialog">\n' +
            '        <div class="modal-content">\n' +
            '            <div class="modal-header"><h5 class="modal-title">Add Link</h5>\n' +
            '                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>\n' +
            '            </div>\n' +
            '            <div class="modal-body">\n' +
            '                <form>\n' +
            '                    <div class="form-group"><input type="text" class="form-control" name="title-link" placeholder="Enter title link"></div>\n' +
            '                    <div class="form-group"><input type="text" class="form-control" name="text-link" placeholder="Enter link"></div>\n' +
            '                </form>\n' +
            '            </div>\n' +
            '            <div class="modal-footer">\n' +
            '                <button type="button" class="btn btn-primary" id="submit-link">Upload</button>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>\n');
        $('body').append(modal);
        modal.modal('show');
        $("#submit-link").on("click", function () {
            var text_link = $('input[name="text-link"]').val();
            var title_link = $('input[name="title-link"]').val();
            $.ajax({
                url: "action_processing/upload_file_link_report.php",
                data: {
                    title_link: title_link,
                    text_link: text_link,
                    job_id: job_id
                },
                type: "POST",
                success: function () {
                    showAlert("Upload link thành công!!");
                }
            })
        })
    });

    //upload img
    $("#add-img-button").on("click", function () {
        $("#img-name").click();
    });

    $("#img-name").on("change", function (e) {
        var fileName = $(this).val();
        if (fileName == null || fileName == "") return false;
        var formData = new FormData();

        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            formData.append(i, $(this).get(0).files[i]);
        }
        formData.append('job_id', job_id);

        $.ajax({
            url: "action_processing/upload_img.php?function_name=img_upload",
            data: formData,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (dataa) {
                if (dataa == 1) {
                    showAlert("Upload ảnh thành công!!!");
                } else {
                    ShowAlertDanger("Upload ảnh không thành công!!!");
                }
            }
        });
    });


    //upload flie
    $("#add-file-button").on("click", function () {
        $("#file-name").click();
    });

    $("#file-name").on("change", function (e) {
        var fileName = $(this).val();
        if (fileName == null || fileName == "") return false;
        var formData = new FormData();

        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            formData.append(i, $(this).get(0).files[i]);
        }
        formData.append('job_id', job_id);
        console.log(formData);

        $.ajax({
            url: "action_processing/upload_img.php?function_name=file_upload",
            data: formData,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (dataa) {
                if (dataa == 1) {
                    showAlert("Upload thành công!!!");
                } else {
                    ShowAlertDanger("Upload không thành công!!!" + dataa);
                }
            }
        });
    });


    //text note
    $(".text-note").on("blur", function () {
        var text = $(this).val();
        var colum = $(this).attr('data-col');
        var job_id = $(this).parent().parent().attr('data-id');
        var user_id = $(this).attr('data-user');
        $.ajax({
            url: "action_processing/set_note.php",
            data: {
                text: text,
                job_id: job_id,
                user_id: user_id,
                colum: colum
            },
            type: "POST",
            success: function () {

            }
        })
    })

    $(".select-status").on("blur", function () {
        var id = $(this).val();
        var job_id = $(this).parent().parent().attr('data-id');
        var colum = $(this).attr('data-col');
        $.ajax({
            url: "action_processing/set_status.php",
            data: {
                id: id,
                job_id: job_id,
                colum: colum
            },
            type: "POST",
            success: function () {
            }

        })
    })

    $(".change-button").on("click", function () {
        var table = $(this).attr("data-table");
        var o;

        if (table == 'project-table') {
            o = $("#project-table");

        }
        if (table == 'job-table') {
            o = $("#job-table");
        }
        if (table == 'rate-table') {
            o = $("#rate-table");
        }
        if (table == 'gantt-table') {
            o = $("#gantt-table");
        }

        if ($(this).hasClass("btn-secondary")) {
            $(this).removeClass("btn-secondary").addClass("btn-warning");
            if (table == 'project-table') {
                show_project = true;
            }
            if (table == 'job-table') {
                show_job = true;
            }
            if (table == 'rate-table') {
                show_rate = true;
            }
            if (table == 'gantt-table') {
                show_gantt = true;
            }
            o.show(500);
            $("table thead, table tbody tr").css({
                height: "fit-content"
            });
        } else {
            $(this).removeClass("btn-warning").addClass("btn-secondary");
            if (table == 'project-table') {
                show_project = false;
            }
            if (table == 'job-table') {
                show_job = false;
            }
            if (table == 'rate-table') {
                show_rate = false;
            }
            if (table == 'gantt-table') {
                show_gantt = false;
            }
            o.hide(500);
        }
    });

    $(".switch-active-job").change(function () {
        var number;
        if (this.checked) {
            number = 1;
        } else {
            number = 0;
        }
        ;
        var job_id = $(this).attr('data-id-job');
        $.ajax({
            url: "action_processing/active_job.php",
            data: {
                done: 0,
                number: number,
                job_id: job_id
            },
            type: "POST",
            success: function (data) {
                if (data == 1) {
                    showAlert("Job đã được lock!!!");
                } else if (data == 0) {
                    showAlert("Job đã được mở!!!");
                }
            }
        })
    });

    $(".switch-done-job").change(function () {
        var numberr;
        if (this.checked) {
            numberr = 1;
        } else {
            numberr = 0;
        }
        if (numberr == 0) {
            if (confirm("Bạn có chắc muốn hủy hoàn thành công việc này? Thời gian hoàn thành công việc sẽ bị thay đổi!!!")) {
                var job_id = $(this).attr('data-id-job');
                $.ajax({
                    url: "action_processing/active_job.php",
                    data: {
                        done: 1,
                        number: numberr,
                        job_id: job_id
                    },
                    type: "POST",
                    success: function (data) {
                        if (data == 1) {
                            showAlert("Job đã hoàn thành!!!");
                        } else if (data == 0) {
                            showAlert("Job chưa hoàn thành!!!");
                        }
                    }
                });
            } else {
                this.checked = !this.checked;
            }
        }
        if (numberr == 1) {
            var job_id = $(this).attr('data-id-job');
            $.ajax({
                url: "action_processing/active_job.php",
                data: {
                    done: 1,
                    number: numberr,
                    job_id: job_id
                },
                type: "POST",
                success: function (data) {
                    if (data == 1) {
                        showAlert("Job đã hoàn thành!!!");
                    } else if (data == 0) {
                        showAlert("Job chưa hoàn thành!!!");
                    }
                }
            });
        }
    });


    $(".row-job").on("mouseenter", function () {
        $(this).addClass('bg-warning-subtle');
        var data_id = $(this).attr('data-id');
        $('[data-id="' + data_id + '"]').addClass('bg-warning-subtle');
    })
    $(".row-job").on("mouseleave", function () {
        $(this).removeClass('bg-warning-subtle');
        var data_id = $(this).attr('data-id');
        $('[data-id="' + data_id + '"]').removeClass('bg-warning-subtle');
    })

    $(".open_dairy_trading").on("click", function () {
        var parent = $("#wallet_list");
        parent.children().each(function () {
            $(this).remove();
        })
        var id = $(this).parent().parent().attr('data-id');
        var role = $(this).attr('data-id-role-user');
        var id_wallet = $(this).attr('data-id-wallet');
        $('input[name="job_id_wallet"]').val(id);
        $.ajax({
            url: "action_processing/select_dairy_trading.php",
            data: {
                id: id,
            },
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#stt-add-trading").text(data.length + 1);
                var text = '';
                var total_cost = 0;
                $.each(data, function (index, element) {
                    if (element.from == id_wallet || element.to==id_wallet || role == 'admin' || role == 'root' ) {
                        text = ' <tr>\n' +
                            '                    <th class="align-middle text-center" scope="row">' + (index + 1) + '</th>\n' +
                            '                    <td class="align-middle text-center">' + element.date + '</td>\n' +
                            '                    <td class="align-middle text-left">' + element.content + '</td>\n' +
                            '                    <td class="align-middle text-center">' + element.from + '</td>\n' +
                            '                    <td class="align-middle text-center">' + element.to + '</td>\n' +
                            '                    <td class="align-middle text-right">' + Number(element.cost).toLocaleString('vi-VN', {style: 'currency', currency: 'VND'}) + '</td>\n' +
                            '                    <td class="align-middle text-center"><a data-id-wallet="'+id_wallet+'" data-role="' + role + '" data-id="' + element.id + '" class="text-black remove-cost" href="#"><i class="fa-solid fa-minus"></i></a></td>\n' +
                            '                </tr> ';
                        total_cost = Number(total_cost) + Number(element.cost);
                    }else {
                        text = ' <tr>\n' +
                            '                    <th class="align-middle text-center" scope="row">' + (index + 1) + '</th>\n' +
                            '                    <td class="align-middle text-center">' + element.date + '</td>\n' +
                            '                    <td class="align-middle text-left">' + element.content + '</td>\n' +
                            '                    <td class="align-middle text-center">' + element.from + '</td>\n' +
                            '                    <td class="align-middle text-center">' + element.to + '</td>\n' +
                            '                    <td class="align-middle text-right">*** đ</td>\n' +
                            '                    <td class="align-middle text-center"><a data-id-wallet="'+id_wallet+'" data-role="' + role + '" data-id="' + element.id + '" class="text-black remove-cost" href="#"><i class="fa-solid fa-minus"></i></a></td>\n' +
                            '                </tr> ';
                    }
                    $("#wallet_list").append(text);
                });
                $("#wallet_list").append(' <tr>\n' +
                    '                    <th class="align-middle text-center" scope="row"></th>\n' +
                    '                    <td class="align-middle text-center"></td>\n' +
                    '                    <td class="align-middle text-left"></td>\n' +
                    '                    <td class="align-middle text-center"></td>\n' +
                    '                    <td class="align-middle text-center"></td>\n' +
                    '                    <td class="align-middle text-right">Job total cost: '+Number(total_cost).toLocaleString('vi-VN', {style: 'currency', currency: 'VND'})+'</td>\n' +
                    '                    <td class="align-middle text-center"></td>\n' +
                    '                </tr> ');
            }
        })
    })

    $(".add-cost").on("click", function () {
        var stt = $("#stt-add-trading").text();
        var date = $('input[name="data_Trading"]').val();
        var content = $('input[name="content_Trading"]').val();
        var from = $('select[name="Trading_from"]').val();
        var to = $('select[name="Trading_to"]').val();
        var cost = $('input[name="cost_Trading"]').val();
        var job_id = $('input[name="job_id_wallet"]').val();
        var o = $(this).parent().parent().parent();

        var text_from = $('#select_from option:selected').text();
        var text_to = $('#select_to option:selected').text();

        $.ajax({
            url: "action_processing/addDiaryTrading.php",
            data: {
                job_id: job_id,
                date: date,
                content: content,
                from: from,
                to: to,
                cost: cost
            },
            type: "POST",
            success: function (data) {
                var text = ' <tr>\n' +
                    '                    <th class="align-middle text-center" scope="row">' + stt + '</th>\n' +
                    '                    <td class="align-middle text-center" >' + date + '</td>\n' +
                    '                    <td class="align-middle text-left">' + content + '</td>\n' +
                    '                    <td class="align-middle text-center">' + text_from + '</td>\n' +
                    '                    <td class="align-middle text-center">' + text_to + '</td>\n' +
                    '                    <td class="align-middle text-right">' + Number(cost).toLocaleString('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }) + '</td>\n' +
                    '                    <td class="align-middle text-center"><a data-id="' + data + '" class="text-black remove-cost" href="#"><i class="fa-solid fa-minus"></i></a></td>\n' +
                    '                </tr> ';
                $("#wallet_list").append(text);
                $("#stt-add-trading").text(Number(stt) + 1);
            }
        })
    })

    $("body").on("click", ".remove-cost", function () {
        var o = $(this).parent().parent();
        var id_trades = $(this).attr('data-id');
        var role = $(this).attr('data-role');
        var id_wallet = $(this).attr('data-id-wallet');
        $.ajax({
            url: "action_processing/removeDiaryTrading.php",
            data: {
                id: id_trades,
                role: role,
                id_wallet:id_wallet
            },
            type: "POST",
            success: function (data) {
                if (data == 2) {
                    ShowAlertDanger("Quá 1 ngày không thể xóa giao dịch!!!");
                }
                if (data == 1) {
                    o.remove();
                    showAlert("Xóa giao dịch thành công!!!");
                }
                if (data==3){
                    ShowAlertDanger("Không thể xóa giao dịch của người khác!!!");
                }
            }
        })
    })

    var monthNames = $('#g-table [data-name-month]').map(function () {
        return $(this).attr('data-name-month');
    }).get();

    setInterval(function () {
        for (var i = 0; i < monthNames.length; i++) {
            var month = monthNames[i];
            var count = $(".date-gantt").filter("[date-month='" + month + "']").not("[style*='display: none']").length;
            $(".date-gantt-month").filter("[data-name-month='" + month + "']").attr('colspan', count);
        }
    }, 5000);


});
