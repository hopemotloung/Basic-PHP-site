const student_click = document.querySelector('#stu');
const student = document.querySelector('.student');

const parent_click = document.querySelector('#par');
const parent1 = document.querySelector('.parent');

const teacher_click = document.querySelector('#tea');
const teacher = document.querySelector('.teacher');


if(student){
    console.log("available");
}else{
    console.log("not available");
}

function show(){
    student.classList.add('whole5');
    parent1.classList.remove('whole5');
    teacher.classList.remove('whole5');
    
}
function show1(){
    student.classList.remove('whole5');
    parent1.classList.add('whole5');
    teacher.classList.remove('whole5');
    
}
function show2(){
    student.classList.remove('whole5');
    parent1.classList.remove('whole5');
    teacher.classList.add('whole5');
    
}


student_click.addEventListener('click', show);
parent_click.addEventListener('click', show1);
teacher_click.addEventListener('click', show2);
