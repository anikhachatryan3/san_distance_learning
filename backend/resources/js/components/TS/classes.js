class Submission {
    constructor() {
        this.user_id = new Number;
        this.answers = new Array(Answer);
    }
    setUserId(id){
        this.user_id = id;
    }
    setAnswers(answers){
        this.answers = answers;
    }
}
class Answer {
    constructor() {
        this.answer = new Number;
        this.math_problem_id = new Number;
    }

    setAnswer(ans){
        this.answer = ans;
    }

    setMathProblemID(id){
        this.math_problem_id = id;
    }

}
