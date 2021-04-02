 export interface Submission {
    user_id: number;
    answers: Answer[]
}
 export interface Answer {
    answer: number;
    math_problem_id: number;
}
