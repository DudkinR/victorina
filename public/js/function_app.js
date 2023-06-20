
function AddNewAnswer() {
    var new_answers = document.getElementById("new_answers");
    var count_answer = document.getElementById("count_answer").value;
    count_answer++;
    document.getElementById("count_answer").value = count_answer;
    var new_answer = document.createElement("div");
    new_answer.setAttribute("class", "form-group");
    new_answer.setAttribute("id", "answer_" + count_answer);
    var new_answer_label = document.createElement("label");
    new_answer_label.setAttribute("for", "answer_" + count_answer + "_new");
    new_answer_label.innerHTML = "Answer new";
    var new_answer_input = document.createElement("input");
    new_answer_input.setAttribute("type", "text");
    new_answer_input.setAttribute("class", "form-control");
    new_answer_input.setAttribute("id", "answer_" + count_answer + "_new");
    new_answer_input.setAttribute("name", "answer_" + count_answer + "_new");
    new_answer.appendChild(new_answer_label);
    new_answer.appendChild(new_answer_input);
    var new_answer_check = document.createElement("div");
    new_answer_check.setAttribute("class", "form-check");
    var new_answer_check_input = document.createElement("input");
    new_answer_check_input.setAttribute("class", "form-check-input");
    new_answer_check_input.setAttribute("type", "checkbox");
    new_answer_check_input.setAttribute("value", "1");
    new_answer_check_input.setAttribute("id", "answer_" + count_answer + "_true");
    new_answer_check_input.setAttribute("name", "answer_" + count_answer + "_true");
    var new_answer_check_label = document.createElement("label");
    new_answer_check_label.setAttribute("class", "form-check-label");
    new_answer_check_label.setAttribute("for", "answer_" + count_answer + "_true");
    new_answer_check_label.innerHTML = "True";
    new_answers.appendChild(new_answer);
    new_answer_check.appendChild(new_answer_check_input);
    new_answer_check.appendChild(new_answer_check_label);
    new_answer.appendChild(new_answer_check);
}

function test() {
    alert("eee");
}
