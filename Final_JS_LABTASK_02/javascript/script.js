(function () {
    'use strict';
    var result;
    var currentNumber;
    var previousResult;
    var history;
    var previousButton;
    var mathOperation;
    var previousMathOperation;
    var mathOperationCount;
    var mathOperationPress;
    var isInit;
    var mainScreen = document.querySelector('#main');
    var historyScreen = document.querySelector('#history');

    Array.prototype.forEach.call(document.querySelectorAll('.button'), function (btn) {
        btn.addEventListener('click', function (e) {
            var btnClicked = e.currentTarget.getAttribute('data-value');
            input(btnClicked);
        });
    });

    function init() {
        result = null;
        currentNumber = 0;
        previousButton = null;
        mathOperation = null;
        previousMathOperation = null;
        mathOperationCount = 0;
        history = '';
        mathOperationPress = false;
        isInit = true;
        updateMainScreen(0);
        updateHistoryScreen(history);
    }

    function input(btn) {

        if (!isNaN(previousButton) && btn !== '=' && btn !== 'C' && btn !== 'CE' && btn !== 'CS' && btn !== '.') {
            previousMathOperation = mathOperation;
        }

        switch (btn) {
            case '+':
                mathOperationPress = true;
                mathOperation = addition;
                break;
            case '-':
                mathOperationPress = true;
                mathOperation = subtraction;
                break;
            case '/':
                mathOperationPress = true;
                mathOperation = division;
                break;
            case '*':
                mathOperationPress = true;
                mathOperation = multiplication;
                break;
            case 'C':
                init();
                break;
        }

        handler(btn);


        var fontSize = parseFloat(mainScreen.style.fontSize);
        if (fontSize < 3 && currentNumber.length < 11) {
            mainScreen.style.fontSize = '3rem';
        }

        console.log('Result: ' + result);
        console.log('previous result: ' + previousResult);
        console.log('current number: ' + currentNumber);
        console.log('btn: ' + btn);
        console.log('previous Math Op: ' + previousMathOperation);
        console.log('Math Op Counter: ' + mathOperationCount);
        console.log('previous btn: ' + previousButton);
        console.log('History: ' + history);
        console.log('Main Screen ' + mainScreen.value);
        console.log('*'.repeat(15));
    }

    function handler(btn) {
        if (btn !== 'C' && result === 'Result is undefined' || result === 'Cannot divide by zero') {
            return;
        }

        if (btn !== '=' && btn !== 'C' && btn !== 'CE' && btn !== 'CS') {
            history = (isNaN(previousButton) && isNaN(btn)) ? history.slice(0, -1) + btn : history + btn;
        }

        if (!isNaN(btn) || btn === '.') {
            if (btn === '.' && /^\d+$/.test(currentNumber)) {
                currentNumber = currentNumber + btn;
            } else if (!isNaN(btn)) {
                currentNumber = (!isNaN(previousButton) && previousButton !== null && mainScreen.value !== '0') || previousButton === '.' ? currentNumber + btn : btn;
            }
            mathOperationPress = false;
            updateMainScreen(currentNumber);
        } else {

            if (btn === '-' || btn === '+' || btn === '*' || btn === '/') {
                if ((previousButton === null || previousButton === '=') && !isInit) {
                    history = '0' + btn;
                    mathOperationCount++;
                }

                if (!historyScreen.value.length && mainScreen.value.length) {
                    history = mainScreen.value + btn;
                }
            }

            if (mathOperation && result === null) {
                result = Number(currentNumber);
            }

            if (btn === '%') {
                history = history.slice(0, -(currentNumber.length + 1));
                currentNumber = percentage(currentNumber, result);
                history += currentNumber + ' ';
                updateMainScreen(currentNumber);
            } else if (btn === 'sqr' || btn === 'sqrt' || btn === '1/x') {
                history = history.slice(0, -(currentNumber.length + btn.length)) + (btn === '1/x' ? '1/(' + currentNumber + ') ' : btn + '(' + currentNumber + ') ');
                currentNumber = (btn === 'sqr') ? square(currentNumber) : (btn === 'sqrt') ? squareRoot(currentNumber) : fraction(currentNumber);
                updateMainScreen(currentNumber);
                updateHistoryScreen(history);
            }

            if (btn === '=') {
                if (mathOperation) {
                    mathOperationCount = 0;
                    if (mathOperationPress) {
                        mathOperation(previousResult);
                    } else {
                        mathOperation(Number(currentNumber));
                    }

                    history = '';
                    previousButton = btn;

                    updateMainScreen(result);
                    updateHistoryScreen(history);

                    return;
                }
            }

            if (isNaN(btn) && (!isNaN(previousButton) || previousButton === '%' || previousButton === 'sqr' || previousButton === 'sqrt' || previousButton === '1/x') &&
                btn !== '=' && btn !== 'C' && btn !== 'CE' && btn !== 'CS' && btn !== '.' && btn !== '%' && btn !== 'sqr' & btn !== 'sqrt' && btn !== '1/x') {
                mathOperationCount++;
            }

            if (mathOperationCount >= 2 && (!isNaN(previousButton) || previousButton === 'sqrt' || previousButton === 'sqr' || previousButton === '1/x' || previousButton === '%') && btn !== 'CE' && btn !== 'CS') {
                previousMathOperation(Number(currentNumber));
                updateMainScreen(result);
            }

            if (btn === 'CE' && history.length > 0) {
                history = history.slice(0, -(currentNumber.length));
                currentNumber = '0';
                updateMainScreen(0);
            } else if (btn === 'CS') {
                if (result != mainScreen.value) {
                    currentNumber = currentNumber.slice(0, -1);
                    history = history.slice(0, -1);
                    if (!currentNumber.length) {
                        currentNumber = '0';
                    }
                    updateMainScreen(currentNumber);
                } else {
                    return;
                }
            }

            if (result !== null && btn !== 'CE' && btn !== 'CS') {
                updateHistoryScreen(history);
            }
        }

        previousButton = btn;
        previousResult = result;
        isInit = false;
    }

    function updateMainScreen(val) {

        val = String(val);

        if (val.length > 10) {
            mainScreen.style.fontSize = '1.75rem';
            val = Math.round(val * 10000000000000000) / 10000000000000000;
        }

        mainScreen.value = val;
    }

    function updateHistoryScreen(history) {
        historyScreen.value = history;
    }

    function addition(val) {
        result += val;
    }

    function subtraction(val) {
        result -= val;
    }

    function division(val) {
        result /= val;
    }

    function multiplication(val) {
        result *= val;
    }

    function square(val) {
        return val * val;
    }

    function squareRoot(val) {
        return Math.sqrt(val);
    }

    function percentage(val, res) {
        return res * val / 100;
    }

    function fraction(val) {
        return 1 / val;
    }

    init();

})();