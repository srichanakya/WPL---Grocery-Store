let timerStartTime;
        let currentQuestion = 0;
        let questions = ["Are you 18 years old?", "Are you a student?", "Do you have low income?"];
        let userAnswers = [];
        let questionStartTime = 0;
        let totalTimeSpent = 0; 

        function startTimer() {
            document.getElementById('start').style.visibility = 'hidden';
            document.getElementById('quiz').style.visibility = 'visible';
            timerStartTime = new Date().getTime();
            questionStartTime = timerStartTime; 
        }

        function nextQuestion() {
            const currentTime = new Date().getTime();
            const timeSpent = currentTime - questionStartTime;
            totalTimeSpent += timeSpent; 
            questionStartTime = currentTime; 

            const answer = document.querySelector('input[name="age"]:checked');
            if (answer) {
                userAnswers.push(answer.value);
            }

            if (currentQuestion < questions.length - 1) {
                currentQuestion++;
                document.getElementById('question').textContent = questions[currentQuestion];
                document.querySelector('input[name="age"]:checked').checked = false;
            } else {
                displaySpecialOffer();
            }
        }

        function displaySpecialOffer() {
            document.getElementById('quizarea').style.visibility = 'hidden';
            const is18 = userAnswers[0] === "Yes";
            const isStudent = userAnswers[1] === "Yes";
            const isLowIncome = userAnswers[2] === "Yes";
            let qualification = "You do not qualify for the special offer.";
            let offerAmount = "No special offer available.";
            let reason = "";

            if (isStudent && isLowIncome) {
                qualification = "You qualify for the special offer!";
                offerAmount = "$75 off your purchase!";
                reason = "You are student with low income";
            } else if (isStudent && !isLowIncome) {
                qualification = "You qualify for the special offer!";
                offerAmount = "10% off (up to $25) your purchase!";
                reason = "You are student"
            } else if (!isStudent && !isLowIncome) {
                qualification = "You qualify for the special offer!";
                offerAmount = "10% off (up to $15) your purchase!";
                reason = "This offer for special customers";
            } else {
                const allQuestionswereskipped = userAnswers.length === 0;
                if (allQuestionsSkipped) {
                    qualification = "You qualify for the special offer!";
                    offerAmount = "1 free delivery on your next order!";
                    reason = "Promositional offer for every customer";
                }
            }

            document.getElementById('qualification').textContent = qualification;
            document.getElementById('offerAmount').textContent = offerAmount;
            document.getElementById('reason').textContent = reason;
            document.getElementById('total-time').textContent = `Total Time Taken: ${totalTimeSpent / 1000} seconds`;
        }