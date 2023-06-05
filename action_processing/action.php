<?php
include 'init.php';
$function_name = $_GET["function_name"];
if ($function_name) {
    call_user_func($function_name, $_POST);
}
function SubmitFormProject($request)
{
    $conn = open();
    $owner = $request['id_user'];
    $Project_Name = $request['Project_Name'];
    $Submit_Form = " INSERT INTO `project`(`Name`, `owner`,`list_user`) VALUES ('$Project_Name',  '$owner','$owner,') ; ";
    query($conn, $Submit_Form);
    $last_id = $conn->insert_id;
    close($conn);
    header("location:../edit_form.php?id=" . $last_id);
}
function editproject($request)
{
    $conn = open();
    $Project_Name = $request['Project_Name'];
    $Start_Date = $request['Start_Date'];
    $End_Date = $request['End_Date'];
    $Work_Group = $request['Work_Group'];
    $Job_Content = $request['Job_Content'];
    $Job_Explain = $request['Job_Explain'];
    $Job_Request = $request['Job_Request'];
    $Job_Target = $request['Job_Target'];
    $Work_Type = $request['Work_Type'];
    $list_user = $request['list_user'];
    $new_work_group = $request['add_new_work_group'];
    $owner = $request['owner'];
    $id_project = $request['id_project'];
    $new_work = $request['new_work'];
    $Submit_Form = " UPDATE `project` SET `Name`= '$Project_Name', `Start_Date` = '$Start_Date', `End_Date` = '$End_Date', `Job_Content` = '$Job_Content', `Job_Explain` = '$Job_Explain', `Job_Request` = '$Job_Request', `Job_Target` = '$Job_Target', `Work_Group` = '$Work_Group', `Work_Type` = '$Work_Type', `list_user` = '$list_user' WHERE id = '$id_project'; ";
    query($conn, $Submit_Form);
    if (!$new_work_group) {
        if (!$new_work) {
            close($conn);
            header("location:../edit_form.php?id=" . $id_project);
        }
        $add_work_type = "INSERT INTO `work_type`(`group_id`, `element`) VALUES ('$Work_Group', '$new_work')";
        query($conn, $add_work_type);
        close($conn);
        header("location:../edit_form.php?id=" . $id_project);
    }
    $add_work_group = "INSERT INTO `work_group`(`title`, `owner`) VALUES ( '$new_work_group', '$owner' )";
    query($conn, $add_work_group);
    if (!$new_work) {
        close($conn);
        header("location:../edit_form.php?id=" . $id_project);
    }
    $add_work_type = "INSERT INTO `work_type`(`group_id`, `element`) VALUES ('$Work_Group', '$new_work')";
    query($conn, $add_work_type);
    header("location:../edit_form.php?id=" . $id_project);
    close($conn);
}
?>