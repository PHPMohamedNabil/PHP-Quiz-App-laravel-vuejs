<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Online Examination
                      <span class="float-right">
                         {{questionIndex}}/{{quizQuestion.length}}
                     </span>
                    </div>
                     
                    <div class="card-body">
                        <span class="float-right" style="color:red;">{{times}}</span>
                      <div v-for="(question,index) in quizQuestion">
                          <div v-show="index ===questionIndex">
                               {{question.question}}
                               <ol>
                                <li v-for="choice in question.answer">
                                 <label>
                                  <input type="radio" :value="choice.is_correct==true?true:choice.answer" :name="index" v-model="userResponses[index]" @click="choices(question.id,choice.id)"/> 
                                   {{choice.answer}}
                                 </label>
                                </li>
                               </ol>
                         </div>
                      </div>
                       
                            
                      <div v-show="questionIndex === quizQuestion.length && solved()==quizQuestion.length">
                           you got {{score()}}/{{quizQuestion.length}}
                           <p>
                               Go to your home page  <a href="/">to see your Result</a>
                           </p>
                      </button>

                      </div>
                      <div v-show="questionIndex === quizQuestion.length && solved()<quizQuestion.length">
                            you completed {{solved()}}/{{quizQuestion.length}}
                            <p>
                                there are many questions with no answer go back and choose answer to it.
                            </p>
                              <button class="btn btn-success float-left"@click="prev()">    Prev
                              </button>
                        </button>
                      </div> 
                      <div v-show="questionIndex !== quizQuestion.length && questionIndex!== 0">
                             <button class="btn btn-success float-right"@click="next();postUserAnswer();">
                          Next
                      </button>
                      <button class="btn btn-success float-left"@click="prev()">    Prev
                      </button>
                      </div>
                      <div v-show="questionIndex === 0">
                      <button class="btn btn-success float-right"@click="next();postUserAnswer();">
                          Next
                      </button>

                      </div>
                     
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['quizId','quizQuestion','time','isPlayed'],
        data(){
           return{
                  questionIndex:0,
                  userResponses:Array(this.quizQuestion.length).fill(false),
                  currentQuestion:0,
                  currentAnswer:0,
                  clock:moment(this.time*60*1000)
           }
        },
        mounted() {
            setInterval(()=>{
                this.clock=moment(this.clock.subtract(1,'seconds'))
            },1000);
        },
        computed:{
            times:function(){
                var minsec=this.clock.format('mm:ss');
                if(minsec == '00:00')
                {
                   alert('TimeOut!');
                   window.location.reload();
                }
                return minsec;
            }
        },
        methods:{
            next(){
                if(this.currentQuestion <= 0 || this.currentAnswer  <= 0)
                {   
                    alert('please choose Answer ')
                    return false;
                }
                this.questionIndex++;
            },
            prev(){
                this.questionIndex--;
            },
            choices(question,answer)
            {
                this.currentQuestion= question;
                this.currentAnswer  = answer;
            },
            score(){
                 return this.userResponses.filter(val=>{
                    return val === true;
                 }).length;
            },
            solved(){
                 return this.userResponses.length;
            }
            ,
            postUserAnswer(){
                 
                if(this.currentQuestion <= 0 || this.currentAnswer  <= 0)
                {
                    return false;
                }

                axios.post('/user/quiz/create',{
                     answer_id:this.currentAnswer,
                     question_id:this.currentQuestion,
                     quiz_id:this.quizId
                }).then((response)=>{
                    console.log(response);
                }).catch((error)=>{
                    
                });
            },
            checkAnswer(){
                if(this.currentQuestion <= 0 || this.currentAnswer  <= 0)
                {
                    alert('please choose answer to this question');
                    return false;
                }
            }

        }
    }
</script>
