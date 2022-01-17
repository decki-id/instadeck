const
    createAcademicButton = document.querySelector("#create-academic_button"),
    createBatchButton = document.querySelector("#create-batch_button"),
    createClassButton = document.querySelector("#create-class_button"),
    createClassroomButton = document.querySelector("#create-classroom_button"),
    createClassScheduleButton = document.querySelector("#create-class-schedule_button"),
    createCourseButton = document.querySelector("#create-course_button"),
    createDayButton = document.querySelector("#create-day_button"),
    createRoleButton = document.querySelector("#create-role_button"),
    createSemesterButton = document.querySelector("#create-semester_button"),
    createUserButton = document.querySelector("#create-user_button"),
    academicFromCreate = document.querySelector("#ac_from-create"),
    batchYearCreate = document.querySelector("#year-create"),
    classCodeCreate = document.querySelector("#class_code-create"),
    classNameCreate = document.querySelector("#class_name-create"),
    classroomCodeCreate = document.querySelector("#code-create"),
    classroomNameCreate = document.querySelector("#name-create"),
    classScheduleCourseCreate = document.querySelector("#schedule_course-create"),
    courseCodeCreate = document.querySelector("#course_code-create"),
    courseNameCreate = document.querySelector("#course_name-create"),
    dayCreate = document.querySelector("#day-create"),
    roleNameCreate = document.querySelector("#role_name-create"),
    semesterCodeCreate = document.querySelector("#semester_code-create"),
    semesterNameCreate = document.querySelector("#semester_name-create"),
    usernameCreate = document.querySelector("#username-create");

if (createAcademicButton) {
    createAcademicButton.addEventListener("click", () => {
        setTimeout(function () {
            academicFromCreate.focus();
        }, 100);
    });
}

if (createBatchButton) {
    createBatchButton.addEventListener("click", () => {
        setTimeout(function () {
            batchYearCreate.focus();
        }, 100);
    });
}

if (createClassButton) {
    createClassButton.addEventListener("click", () => {
        setTimeout(function () {
            classNameCreate.focus();
        }, 100);
    });
}

if (createClassroomButton) {
    createClassroomButton.addEventListener("click", () => {
        setTimeout(function () {
            classroomNameCreate.focus();
        }, 100);
    });
}

if (createClassScheduleButton) {
    createClassScheduleButton.addEventListener("click", () => {
        setTimeout(function () {
            classScheduleCourseCreate.focus();
        }, 100);
    });
}

if (createCourseButton) {
    createCourseButton.addEventListener("click", () => {
        setTimeout(function () {
            courseNameCreate.focus();
        }, 100);
    });
}

if (createDayButton) {
    createDayButton.addEventListener("click", () => {
        setTimeout(function () {
            dayCreate.focus();
        }, 100);
    });
}

if (createRoleButton) {
    createRoleButton.addEventListener("click", () => {
        setTimeout(function () {
            roleNameCreate.focus();
        }, 100);
    });
}

if (createSemesterButton) {
    createSemesterButton.addEventListener("click", () => {
        setTimeout(function () {
            semesterNameCreate.focus();
        }, 100);
    });
}

if (createUserButton) {
    createUserButton.addEventListener("click", () => {
        setTimeout(function () {
            usernameCreate.focus();
        }, 100);
    });
}

function classCodeValue() {
    var className = classNameCreate.value.toUpperCase();
    var letter = className.match(/\b(\w)/g);
    if (letter != null) {
        var string = letter.join('');
        classCodeCreate.value = string;
    }
}

function classroomCodeValue() {
    var className = classroomNameCreate.value.toUpperCase();
    var letter = className.match(/\b(\w)/g);
    if (letter != null) {
        var string = letter.join('');
        classroomCodeCreate.value = string;
    }
}

function courseCodeValue() {
    var courseName = courseNameCreate.value.toUpperCase();
    var matches = courseName.match(/\b(\w)/g);
    if (matches != null) {
        var acronym = matches.join('');
        courseCodeCreate.value = acronym;
    }
}

function semesterCodeValue() {
    var semesterName = semesterNameCreate.value.toUpperCase();
    var matches = semesterName.match(/\b(\w)/g);
    if (matches != null) {
        var acronym = matches.join('');
        semesterCodeCreate.value = acronym;
    }
}