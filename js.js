$(document).ready(function () {
    var finduserky = "";
    var ajax = $.ajax();
    find_user_fn = function () {
        finduserky = $("#findusername").val().trim();
        ajax.abort();
        if (finduserky == "") {
            $("#findusernametext").hide(500);
            return;
        }
        ajax = $.ajax({
            url: "action_processing/find_user.php?key=" + finduserky
        }).done(function (data) {
            if (data == "null") {
                $("#findusernametext").hide(500);
                return;
            }
            var data2 = JSON.parse(data);
            var text = "";
            for (i = 0; i < data2.length; i++) {
                var avatar = data2[i]['avatar'];
                if (avatar == null) avatar = "noavatar.png";
                var tooltip = data2[i]['name'] + ' (' + data2[i]['email'] + ')';
                text += '<a data-tooltip="' + tooltip + '" data-avatar="' + avatar + '" data-id="' + data2[i]['id'] + '" href="#" type="text" class="form-control"><span class="img-wrap" data-role="' + data2[i]['role'] + '"><img class="mr-1 rounded-circle role-' + data2[i]['role'] + '" style="width: 30px; height: 30px" src="assets/images/' + avatar + '"></span>' + tooltip + '</a>';
            }
            $("#findusernametext").html(text).show(500);
        });
    }
    $("#findusername").keyup(function () {
        find_user_fn();
    });

    $("#findusernametext").on("click", "a", function () {
        var o = $("input[name='list_user']");
        var listid = o.val();
        var id = $(this).attr("data-id");
        var role = $(this).find("span").attr("data-role");
        if (listid.startsWith(id + ',') || listid.includes(',' + id + ',')) return false;
        o.val(listid + id + ",");
        $("#list_user_avatar").append('<span class="img-wrap" data-role="' + role + '"><img data-id="' + id + '" data-toggle="tooltip" title="' + $(this).attr("data-tooltip") + '" class="mr-1 rounded-circle role-' + role + '" style="width: 23px; height: 23px" src="assets/images/' + $(this).attr("data-avatar") + '"></span>');
        $(".update-add-user-project").change();
        return false;
    });

    $("#list_user_avatar").on("dblclick", "img", function () {
        var o = $("input[name='list_user']");
        var listid = o.val();
        var id = $(this).attr("data-id");
        if (listid.startsWith(id + ',')) listid = listid.replace(id + ',', "");
        if (listid.includes(',' + id + ',')) listid = listid.replace(',' + id + ',', ",");
        o.val(listid);
        $(".update-add-user-project").change();
        $(this).remove();
    });

    $("#findusergroup").mouseleave(function () {
        $("#findusernametext").hide(500);
    });

    $("#findusergroup").mouseenter(function () {
        ajax.abort();
        find_user_fn();
    });

    // on change select work group
    $("#select_work_group").change(function () {
        var selectedvalue = $(this).val();
        $.ajax({
            url: "action_processing/select_work_type.php", type: "POST", data: {
                Work_Group: selectedvalue
            }, dataType: "json", success: function (data) {
                var text = "<option selected value=" + 0 + ">Default</option>";
                for (i = 0; i < data.length; i++) {
                    var id = data[i]['group_id'];
                    var element = data[i]['element'];
                    text += '<option value="' + id + '"> ' + element + ' </option>';
                }
                $("#select_work_type").html(text)
            }
        })
    })

    //delete group
    $("#edit_job").on("click", ".button-delete-group", function () {
        var tr = $(this).parent().parent().parent();
        var id = tr.attr("data-id");
        $.ajax({
            url: "action_processing/group_action.php?function_name=delete_group&id=" + id,
            type: "POST",
            success: function (data) {
                tr.hide(500);
                setTimeout(function () {
                    tr.remove();
                    $("#edit_job tbody tr[parent='" + id + "']").insertBefore("#add_group_job");


                }, 500);
            }
        })
    });

    //add group
    $(".button-add-group").click(function () {
        var tr = $(this).parent();
        var id = tr.attr("data-id");
        var o = $("input[name='title_new_group']");
        var title = o.val();
        $.ajax({
            url: "action_processing/group_action.php?function_name=create_group&id=" + id + "&title=" + title,
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                o = $("#default").clone().removeAttr("id").attr("data-id", data[0]['id']).hide().insertBefore("#default").show(500);
                o.find("td").eq(1).text(data[0]['title']);
                o.find(".d-none").removeClass("d-none").addClass("button-delete-group");
            }
        })
    });


    //add users
    $('.button_add_user').on('mouseenter', function () {
        var o_dt = $("input[name='list_user']").val();
        $('#addusernametext').removeClass('d-none').remove().appendTo($(this).closest('td'));
        var data = "";
        $("#list_user_avatar img").each(function () {
            var title = $(this).attr("title");
            var avatar = $(this).attr("src").replace("assets/images/", "");
            var data_id = $(this).attr("data-id");
            var data_role = $(this).attr("data-role");
            data += '<a data-role="data_role"  data-tooltip="' + title + '" data-avatar="' + avatar + '" data-id="' + data_id + '" href="#" type="text" class="form-control a-button-add-ueser"><img class="rounded-circle role-' + data_role + '" data-id="' + data_id + '" title="' + title + '" class="mr-1" style="width: 30px; height: 30px" src="assets/images/' + avatar + '">' + title + '</a>';
        }).promise().done(function () {
            $('#addusernametext').html(data);
        });
    });

    $('#add_group_job td:has(.button_add_user)').on('mouseleave', function () {
        $(this).closest('td').find('#addusernametext').addClass('d-none');
    });


    $("body").on("click", ".a-button-add-ueser", function () {
        var parent_fieldset = $(this).parent().parent();
        var list_id = parent_fieldset.find(".list_id_user");
        var listid = list_id.val()
        var id = $(this).attr("data-id");
        if (listid.startsWith(id + ',') || listid.includes(',' + id + ',')) return false;
        var data_id = $(this).attr("data-id");
        var title = $(this).attr("data-tooltip");
        var avatar = $(this).attr("data-avatar");
        var data_role = $(this).attr("data-role");
        var text = '<img id="avatar-user" data-id="' + data_id + '" data-toggle="tooltip" title="' + title + '" class="mr-1 rounded-circle role-' + data_role + '" style="width: 30px; height: 30px" src="assets/images/' + avatar + '">';
        var o = $(this);
        var listall = "";
        $(".list_id_user").each(function () {
            listall += $(this).val();
        }).promise().done(function () {
            if (listall.startsWith(id + ',') || listall.includes(',' + id + ',')) return false;
            list_id.val(listid + id + ",");
            o.parent().prev().find("button").before(text);
        });
        return false;
    });

    $("body").on("dblclick", "#avatar-user", function () {
        var value_input = $(this).parent().find(".list_id_user");
        var listid = value_input.val();
        var id = $(this).attr("data-id");
        if (listid.startsWith(id + ',')) listid = listid.replace(id + ',', "");
        if (listid.includes(',' + id + ',')) listid = listid.replace(',' + id + ',', ",");
        value_input.val(listid);
        $(this).remove();
    })

    //add job
    $("body").on("click", ".button-add-job", function () {
        var Worker = $("input[name='Worker']").val();
        var Supporter = $("input[name='Supporter']").val();
        var Supervisor = $("input[name='Supervisor']").val();
        var start = $("input[name='startdata']").val();
        var end = $("input[name='enddate']").val();
        var Pty = $("select[name='prority']").val();
        var id = $(this).attr("data-id");
        var title = $("input[name='title_new_group']").val();
        $.ajax({
            url: "action_processing/job_action.php?function_name=create_job",
            type: "POST",
            dataType: "JSON",
            data: {
                Worker: Worker,
                Supporter: Supporter,
                Supervisor: Supervisor,
                start: start,
                end: end,
                Pty: Pty,
                id: id,
                title: title
            },
            success: function (data) {
                var user1 = $("#add_group_job fieldset").eq(0).clone();
                user1.find("button").remove();
                user1.find("input").remove();

                var user2 = $("#add_group_job fieldset").eq(1).clone();
                user2.find("button").remove();
                user2.find("input").remove();

                var user3 = $("#add_group_job fieldset").eq(2).clone();
                user3.find("button").remove();
                user3.find("input").remove();


                var job = '                             <tr data-id="'+data[0]['id']+'">\n' +
                    '                                       <td data-project-id="'+id+'" class="text-center parent-job" data-parent="0">\n' +
                    '                                               <p class="btn btn-info text-white" style="padding: 0px 5px;font-size: 12px">\n' +
                    '                                                   G\n' +
                    '                                                </p>\n' +
                    '                                       </td>\n' +
                    '                                       <td class="py-0">\n' +
                    '                                       <div class=" mt-2 ml-4">\n' +
                    '                                               <input class="update-now form-input-table w-100" value="'+ title +'" data-table="job" data-col="title" style="width:300px;">\n' +
                    '                                       </div>\n' +
                    '                                       </td> \n' +
                    '                                            <td class="py-0">\n' +
                    '                                                <div class=" mt-2">' + user1.html() + '</div>\n' +
                    '                                            </td>\n' +
                    '                                            <td class="py-0">\n' +
                    '                                                <div class=" mt-2">' + user2.html() + '</div>\n' +
                    '                                            </td>\n' +
                    '                                            <td class="py-0">\n' +
                    '                                                <div class=" mt-2">' + user3.html() + '</div>\n' +
                    '                                            </td>\n' +
                    '                                            <td class="py-0">\n' +
                    '                                                <div class=" mt-2">' + data[0]['startdate'] + '</div>\n' +
                    '                                            </td>\n' +
                    '                                            <td class="py-0">\n' +
                    '                                                <div class=" mt-2">' + data[0]['enddate'] + '</div>\n' +
                    '                                            </td>\n' +
                    '                                            <td class="py-0">\n' +
                    '                                                <div class=" mt-2">' + data[0]['prority'] + '</div>\n' +
                    '                                            </td>\n' +
                    '                                            <td>\n' +
                    '                                                <div data-id="'+data[0]['id']+'" class="d-flex justify-content-center">\n' +
                    '                                                    <button type="button"\n' +
                    '                                                            class="btn btn-danger delete-job"\n' +
                    '                                                            style="padding: 0px 5px;font-size: 12px">\n' +
                    '                                                        <i class="fa-solid fa-trash"></i>\n' +
                    '                                                    </button>\n' +
                    '                                                </div>\n' +
                    '                                            </td>\n' +
                    '                                        </tr>';
                $("#add_group_job").before(job);
            }
        })
    })

    var imgenter = false;
    var cardenter = false;
    //profile display
    $(".img-user").on('mouseenter', function (event) {
        imgenter = true;
        o = $(this);
        cardtime = setTimeout(function () {
            var x = event.pageX;
            var y = event.pageY;
            var width = $(window).width();
            var height = $(window).height();
            var dx;
            var dy;

            var name = o.attr("name-user");
            var img_url = o.attr("src");
            var role = o.attr("role");
            var $cardProfile = $("#card-profile");
            var deltax = 478;
            var deltay = 215;
            if (x < width / 2) deltax = 0;
            if (y < height / 2) deltay = 0;
            $cardProfile.css({
                'position': 'fixed',
                'top': (y - deltay) + 'px',
                'left': (x - deltax) + 'px'
            })
            $cardProfile.removeClass('d-none');
            $cardProfile.find("img").attr("src", img_url);
            $cardProfile.find("#name-profile").html(name);
            $cardProfile.find("#role-name").html(role);
        }, 500);
    })
    $('.img-user').on('mouseleave', function () {
        imgenter = false;
        setTimeout(function () {
            if (!cardenter) {
                $("#card-profile").addClass('d-none');
                cardtime = null;
            }
        }, 500);
    });
    $("#card-profile").on('mouseenter', function () {
        cardenter = true;
    });
    $("#card-profile").on('mouseleave', function () {
        cardenter = false;
        setTimeout(function () {
            if (!imgenter) {
                $("#card-profile").addClass('d-none');
                cardtime = null;
            }
        }, 500);
    });

    // delete job
    $("body").on("click",".delete-job", function () {
        var id = $(this).parent().attr("data-id");
        var tr = $(this).parent().parent().parent();
        $.ajax({
            url: "action_processing/job_action.php?function_name_delete_job=delete_job",
            data: {
                id: id
            },
            type: "POST",
            success: function () {
                tr.hide(500);
                setTimeout(function () {
                    tr.remove();
                }, 500);
            }
        })
    })

    //button select group
    $("body").on("mouseenter", '.parent-job', function () {
        var parent_id = $(this).attr('data-parent');
        var project_id = $(this).attr('data-project-id');
        var o = $(this);
        $.ajax({
            url: "action_processing/job_action.php?function_name_delete_job=select_group",
            data: {
                id: parent_id,
                project_id: project_id
            },
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                var text = "";
                for (i = 0; i < data.length; i++) {
                    var title = data[i]['title'];
                    text += '<a id="' + data[i]['id'] + '"  href="#" type="text" class="form-control option-group">' + title + '</a>';
                }
                var list_group = $("#select-group-list");
                list_group.html(text);
                list_group.removeClass("d-none").remove().appendTo(o);
            }
        })
    })

    $('.parent-job').on('mouseleave', function () {
        $(this).closest('div').find('#select-group-list').addClass('d-none');
    });

    $("body").on("click", ".option-group", function () {
        var parent = $(this).attr("id");
        var id = $(this).parent().parent().parent().attr("data-id");
        var o = $(this).parent().parent().parent();
        var a = $(this).parent().parent();
        $.ajax({
            url: "action_processing/job_action.php?function_name_update_job=update_group_job",
            data: {
                id: id,
                parent: parent,
            },
            type: "POST",
            success: function () {
                var groups = $('.group_id');
                var pos = 0;
                var index = 0;
                groups.each(function () {
                    if ($(this).attr("data-id") == parent) pos = index;
                    index++
                }).promise().done(function () {
                    a.attr("data-parent", parent);
                    o.clone().hide().insertBefore(groups.eq(pos + 1)).show(500);
                    o.hide(500).remove();
                });
            }
        })
        return false;
    })

//down job
    $(".down-job").on("click", function () {
        var o = $(this).parent().parent().parent();
        var nextO = o.next();
        var id = o.attr("data-id");
        var order_by = o.attr("order-by");
        var order_by_next = nextO.attr("order-by");
        var parent = o.attr("parent");
        $.ajax({
            url: "action_processing/job_action.php?function_name_update_order_by=job_down",
            data: {
                id: id,
                parent: parent,
                order_by: order_by
            },
            type: "POST",
            success: function () {
                if (nextO.hasClass("group_id")) {
                    return;
                }
                o.insertAfter(nextO).attr("order-by", order_by_next);
                nextO.hide().insertBefore(o).show(500).attr("order-by", order_by);
            }
        })
    })
//down group
    $(".dow-group").on("click", function () {
        var o = $(this).parent().parent().parent();
        var block_group_next = o.next();
        while (!block_group_next.hasClass("group_id")) block_group_next = block_group_next.next();
        var id = o.attr("data-id");
        var order_by = o.attr("group-order-by");
        var order_by_next = block_group_next.attr("group-order-by");
        $.ajax({
            url: "action_processing/group_action.php?function_name_down_group=down_group&id=" + id + "&order_by=" + order_by,
            type: "POST",
            success: function () {
                o_child = $("#edit_job tbody tr[parent='" + id + "']");
                b_child = $("#edit_job tbody tr[parent='" + block_group_next.attr("data-id") + "']");
                o.insertAfter(block_group_next).after(o_child).attr("group-order-by", order_by_next);
                block_group_next.after(b_child).attr("group-order-by", order_by);
            }
        })
    })


    //update all now
    $(".update-now").on("blur", function () {
        if ($(this).attr('data-compare') != null) {
            var p = $(this).parents('.compare-group').eq(0);
            if ($(this).attr('data-compare') == 'min') {
                var min = $(this).val();
                var max = p.find("[data-compare='max']").val();
            } else {
                var min = $(this).val();
                var max = p.find("[data-compare='max']").val();
            }
            if (min > max) {
                alert("ERROR!");
                return;
            }
        }
        save_it($(this));
    });
    save_it = function (o) {
        var table = o.attr("data-table");
        var colum = o.attr("data-col");
        var value = o.val();
        console.log(value, table, colum);
        if (table == "job") {
            var id = o.parent().parent().parent().attr("data-id");
        }
        if (table == "project") {
            var id = o.closest("[data-project-id]").attr("data-project-id");
        }
        $.ajax({
            url: "action_processing/update_all_now.php",
            data: {
                table: table,
                colum: colum,
                value: value,
                id: id
            },
            type: "POST",
            success: function () {
            }
        });
    }

    // add user
    $("body").on("change", ".update-add-user-project", function () {
        var text = $("input[name='list_user']").val();
        var id = $(this).closest("[data-project-id]").attr("data-project-id");
        console.log(text, id);
        $.ajax({
            url:"action_processing/update_user_list_project.php",
            data:{
                text:text,
                id:id
            },
            type:"POST",
            success:function () {
            }
        })
    })

    //add radio
    $(".append-radio-button").on("click", function () {
        var input_status = $(this).siblings('.input-status').val();
        var id = $(this).closest("[data-project-id]").attr("data-project-id");
        var colum = $(this).attr('data-col');
        var button = $(this).parent().parent().parent();
        $.ajax({
            url: "action_processing/setOption.php",
            data: {
                id: id,
                input_status: input_status,
                colum: colum
            },
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                var listHTML = "";
                $.each(data.rows, function (index, element) {
                    var id = element.id;
                    var text = element.text;
                    listHTML = '<li class="nav-item border-bottom">\n' +
                        '           <div class="nav-link pb-1">\n' +
                        '              <div class="row" data-id="'+id+'" data-col="'+colum+'">\n' +
                        '                 <div class="text-dark px-0 col-8 ">\n' +
                        '                    <input class="form-input-table text-start" value="'+text+'">\n' +
                        '                 </div>\n' +
                        '              <div class="col-4 px-0 text-end">\n' +
                        '                   <button type="button" class="btn badge btn-danger down-radio"><i class="fa-solid fa-caret-down text-white"></i></button>\n' +
                        '                   <button type="button" class="btn badge btn-warning remove-radio-button">-</button>\n' +
                        '              </div>\n' +
                        '            </div>\n' +
                        '           </div>\n' +
                        '       </li>';
                });
                button.before(listHTML);
            }
        })
    })


//remove radio
    $("body").on("click", ".remove-radio-button", function () {
        var id_json = $(this).parent().parent().attr("data-id");
        var colum = $(this).parent().parent().attr("data-col");
        var id = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().attr("data-project-id");
        var parent = $(this).parent().parent().parent();
        $.ajax({
            url: "action_processing/removeoption.php",
            data: {
                id: id,
                id_json: id_json,
                colum: colum
            },
            type: "POST",
            success: function () {
                parent.remove();
            }
        })
    })

//down radio
    $("body").on("click",".down-radio", function () {
        var id = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().attr("data-project-id");
        var id_json = $(this).parent().parent().attr("data-id");
        var colum = $(this).parent().parent().attr("data-col");
        var o = $(this).parent().parent().parent().parent();
        var onext = o.next();
        $.ajax({
            url: "action_processing/down_option.php",
            data: {
                id: id,
                id_json: id_json,
                colum: colum
            },
            type: "POST",
            success: function () {
                if (onext.hasClass("append-radio-button")) {
                    return;
                }
                ;
                o.insertAfter(onext);
                onext.insertBefore(o);
            }
        });
    });


//update caption
    $(".input_caption").on("blur", function () {
        var id = $(this).parents("[data-project-id]").attr("data-project-id");
        var input_new = $(this).val();
        var colum = $(this).attr("data-col");
        $.ajax({
            url: "action_processing/update_caption.php",
            data: {
                id: id,
                colum: colum,
                input_new: input_new
            },
            type: "POST",
            success: function () {

            }
        })
    })

//update text start
    $(".text-start").on("blur", function () {
        var input_new = $(this).val();
        var id = $(this).closest("[data-project-id]").attr("data-project-id");
        var id_json = $(this).parent().parent().attr('data-id');
        var colum = $(this).parent().parent().attr('data-col');
        $.ajax({
            url: "action_processing/update_input_text.php",
            data: {
                id: id,
                input_new: input_new,
                id_json: id_json,
                colum: colum
            },
            type: "POST",
            success: function () {

            }
        })
    })


//active on off
    $('#item1').change(function () {
        var number;
        var id = $(this).attr("data-project-id");
        if (this.checked) {
            number = 1;
        } else {
            number = 0;
        }
        $.ajax({
            url: "action_processing/active_now.php",
            data: {
                number: number,
                id: id
            },
            type: "POST",
            success: function () {
            }
        })
    });


    $('.input-status').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            var $inputStatus = $(this);
            var $parentLi = $inputStatus.closest('li');
            var $appendButton = $parentLi.find('.append-radio-button');
            $appendButton.trigger('click');
            return false;
        }
    });

});
