//punyaknya orang
 
console.clear();

// Tick the increase button
$('#id-bet-on-lose').click();
 
var won = null;

(function() {
    // Stop losses limit
    var stopLossInput = prompt("Stop Loss Limit", '10');

    var count = $("#history-my-bets-dice span.text-danger").length;
    var countLoss = $("#history-my-bets-dice span.text-danger").length;

    function checkStopLimit(stopLossInput){
 
        var lastItems = $("#history-my-bets-dice tr").slice(0, stopLossInput);

        var dangerCount = lastItems.find("span.text-danger").length;
    
        console.log("dangerCount:"+ dangerCount);
    
        if(dangerCount >= stopLossInput) {
            console.log("Killed");
            $('#btn-bet-stop-pilot-dice').click();
            //kill();
        }
    
        lastItems.each(function() {
            console.log($(this).find("span.text-danger").text());
        });
      
    }

    $('#history-my-bets-dice').bind("DOMNodeInserted",function(){
        console.log("Item added");
        checkStopLimit(stopLossInput);
    });
    
    alert("Do not sell this script, and do not remove the credit if reupload it. Tiga asa yosa");
    
    var balance = parseFloat(prompt("Type in your exact balance!!!", '0.000001'));
   
    if (balance == null || isNaN(balance)) {
        alert("Invalid balance, aborting");
        return;
    } 
    
    var stopAmount = parseFloat(stopAmount);
    var stopLoss = "";
    
    // Risk seviyeleri
    // Kendi atadığı risk seviyeleri
    var risk = prompt("How much risk you want to have? 1 - Low, 2 - Medium, 3 - High, 4 - Auto Mode 5 - Super Power 6 - Switching Mode, 7 - Super Save (new), 8 - Huge Profit", '1');

    if (risk != "1" && risk != "2" && risk != "3" && risk != "4" && risk != "5" && risk != "6" && risk != "7" && risk != "8") {
        alert("Invalid risk entered, aborting");
        return false;
    }
    
    if (risk == "1") {
        low();
    } else if (risk == "2") {
        medium();
    } else if (risk == "3") {
        high();
    } else if (risk == "4") {
        automode();
    } else if (risk == "5") {
        super_power();
    } else if (risk == "6") {
        switch_mode();
    } else if (risk == "7") {
        super_save();
    } else {
        huge_profit();
    }

    function medium() {
        
        // Done
        if (balance < 0.00001) {
            var amount = document.getElementById("amount").value = "0.00000005";
            var chance = $.trim($("#editable-chance-field").val("9.99%"));
            var payout = document.getElementById('editable-payout').innerHTML = "9.9099";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("12"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
            var timeout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit > stop) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
        }
        // Done
        else if (balance < 0.0001 && balance > 0.00001) {
            var amount = document.getElementById("amount").value = "0.00000010";
            var chance = $.trim($("#editable-chance-field").val("9.90%"));
            var payout = document.getElementById('editable-payout').innerHTML = "10.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("12"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
            var timeout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit > stop) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
        }
        // Done
        else if (balance < 0.001 && balance > 0.0001) {
            var amount = document.getElementById("amount").value = "0.0000001";
            var chance = $.trim($("#editable-chance-field").val("66%"));
            var payout = document.getElementById('editable-payout').innerHTML = "1.5000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("110"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
            var timeout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit > stop) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
        }
        // Done
        else if (balance < 0.01 && balance > 0.001) {
            var final_amount = balance > 0.001 && balance <= 0.002 ? 1 : balance > 0.002 && balance <= 0.003 ? 2 : balance > 0.003 && balance <= 0.004 ? 3 : balance > 0.004 && balance <= 0.005 ? 4 : balance > 0.005 && balance <= 0.006 ? 5 : balance > 0.006 && balance <= 0.007 ? 6 : balance > 0.007 && balance <= 0.008 ? 7 : balance > 0.008 && balance <= 0.009 ? 8 : balance > 0.009 && balance <= 0.01 ? 9 : 0;
            var amount = document.getElementById("amount").value = "0.000000" + final_amount;
            var chance = $.trim($("#editable-chance-field").val("4.95%"));
            var payout = document.getElementById('editable-payout').innerHTML = "20.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("7.77"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
            var timeout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit > stop) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
        }
        // Done
        else if (balance < 0.1 && balance > 0.01) {
            var final_amount = balance > 0.01 && balance <= 0.02 ? 1 : balance > 0.02 && balance <= 0.03 ? 2 : balance > 0.03 && balance <= 0.04 ? 3 : balance > 0.04 && balance <= 0.05 ? 4 : balance > 0.05 && balance <= 0.06 ? 5 : balance > 0.06 && balance <= 0.07 ? 6 : balance > 0.07 && balance <= 0.08 ? 7 : balance > 0.08 && balance <= 0.09 ? 8 : balance > 0.09 && balance <= 0.1 ? 9 : 0;
            var amount = document.getElementById("amount").value = "0.00000" + final_amount;
            var chance = $.trim($("#editable-chance-field").val("4.95%"));
            var payout = document.getElementById('editable-payout').innerHTML = "20.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("7.77"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
            var timeout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit > stopAmount) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
        } else if (balance >= 0.1 && balance <= 1) {
            var final_amount = balance > 0.1 && balance <= 0.2 ? 1 : balance > 0.2 && balance <= 0.3 ? 2 : balance > 0.3 && balance <= 0.4 ? 3 : balance > 0.4 && balance <= 0.5 ? 4 : balance > 0.5 && balance <= 0.6 ? 5 : balance > 0.6 && balance <= 0.7 ? 6 : balance > 0.7 && balance <= 0.8 ? 7 : balance > 0.8 && balance <= 0.9 ? 8 : balance > 0.9 && balance <= 1 ? 9 : 2;
            var amount = document.getElementById("amount").value = "0.0000" + final_amount;
            var chance = $.trim($("#editable-chance-field").val("4.95%"));
            var payout = document.getElementById('editable-payout').innerHTML = "20.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("7.77"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
            var stopout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit < minus) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
            var timeout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit > stop) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
        } else if (balance >= 1) {

            var amount = document.getElementById("amount").value = "0.000001";
            var chance = $.trim($("#editable-chance-field").val("0.6%"));
            var payout = document.getElementById('editable-payout').innerHTML = "165.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("2.01"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
            var stopout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit < minus) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
            var timeout = setTimeout(function() {
                var profit = $('#auto_stats_profit').html();
                var profit = parseFloat(profit);
                if (profit > stop) {
                    alert("You got your profit, enjoy");
                    kill();
                }
            }, 1);
        }
        var stopout = setTimeout(function() {
            var profit = $('#auto_stats_profit').html();
            var profit = parseFloat(profit);
            if (profit < minus) {
                alert("You got your profit, enjoy");
                kill();
            }
        }, 1);
    }

    function huge_profit() {
        var amount = document.getElementById("amount").value = "0.00001";
        var chance = $.trim($("#editable-chance-field").val("3.33%"));
        var payout = document.getElementById('editable-payout').innerHTML = "29.7297";
        // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
        // jQuery needed here:
        var increase = $.trim($("#pourc-bet-on-lose").val("7.77"));
        // First click the updated condition
        $('#updated_condition').click();
        // Wait 50 ms
        wait(50);
        $('#btn-bet-start-pilot-dice').click();
        var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
        var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
    }

    function wait(ms) {
        var start = new Date().getTime();
        var end = start;
        while (end < start + ms) {
            end = new Date().getTime();
        }
    }

    function jmp_up(void_function) {
        alert("The program will wait now 50 seconds, after that page will refresh and u can paste script again!");
        wait(50000);
        window.location.href.replace("http://bitsler.com", "http://bitsler.com");
    }

    function super_save() {

        if (balance <= 0.001 && balance >= 0.0001) {
            var amount = document.getElementById("amount").value = "0.00000001";
            var chance = $.trim($("#editable-chance-field").val("9%"));
            var payout = document.getElementById('editable-payout').innerHTML = "11.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("11"));
            // First click the updated condition
            $('#updated_condition').click();
            // Tick increase on win button

            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance >= 0.001 && balance <= 0.01) {
            var amount = document.getElementById("amount").value = "0.0000001";
            var chance = $.trim($("#editable-chance-field").val("9%"));
            var payout = document.getElementById('editable-payout').innerHTML = "11.000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("11"));
            // First click the updated condition
            $('#updated_condition').click();
            // Tick increase on win button

            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance >= 0.01 && balance <= 0.1) {
            var amount = document.getElementById("amount").value = "0.000001";
            var chance = $.trim($("#editable-chance-field").val("9%"));
            var payout = document.getElementById('editable-payout').innerHTML = "11.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("11"));
            // First click the updated condition
            $('#updated_condition').click();
            // Tick increase on win button

            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance >= 0.1) {
            var amount = document.getElementById("amount").value = "0.00001";
            var chance = $.trim($("#editable-chance-field").val("9%"));
            var payout = document.getElementById('editable-payout').innerHTML = "11.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("11"));
            // First click the updated condition
            $('#updated_condition').click();
            // Tick increase on win button

            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        }
    }

    function high() {
        if (balance < 0.00001) {
            var amount = document.getElementById("amount").value = "0.0000001";
            var chance = $.trim($("#editable-chance-field").val("9.90%"));
            var payout = document.getElementById('editable-payout').innerHTML = "10.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("12"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance < 0.0001 && balance > 0.00001) {
            var amount = document.getElementById("amount").value = "0.00000025";
            var chance = $.trim($("#editable-chance-field").val("15%"));
            var payout = document.getElementById('editable-payout').innerHTML = "6.6000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("30"));
            // First click the updated condition
            $('#updated_condition').click();
            // Tick increase on win button

            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance < 0.001 && balance > 0.0001) {
            var amount = document.getElementById("amount").value = "0.00000005";
            var chance = $.trim($("#editable-chance-field").val("7.41%"));
            var payout = document.getElementById('editable-payout').innerHTML = "13.3603";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("12"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance < 0.01 && balance > 0.001) {
            var final_amount = balance > 0.001 && balance <= 0.002 ? 1 : balance > 0.002 && balance <= 0.003 ? 2 : balance > 0.003 && balance <= 0.004 ? 3 : balance > 0.004 && balance <= 0.005 ? 4 : balance > 0.005 && balance <= 0.006 ? 5 : balance > 0.006 && balance <= 0.007 ? 6 : balance > 0.007 && balance <= 0.008 ? 7 : balance > 0.008 && balance <= 0.009 ? 8 : balance > 0.009 && balance <= 0.01 ? 9 : 0;
            final_amount = final_amount + 1;
            var amount = document.getElementById("amount").value = "0.000000" + final_amount;
            var chance = $.trim($("#editable-chance-field").val("9.9%"));
            var payout = document.getElementById('editable-payout').innerHTML = "10.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("12"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance < 0.1 && balance > 0.01) {
            var amount = document.getElementById("amount").value = "0.000003";
            var chance = $.trim($("#editable-chance-field").val("0.99%"));
            var payout = document.getElementById('editable-payout').innerHTML = "100.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("1.3"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance > 0.1) {
            var amount = document.getElementById("amount").value = "0.000015";
            var chance = $.trim($("#editable-chance-field").val("5.58%"));
            var payout = document.getElementById('editable-payout').innerHTML = "17.7419";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("7.89"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        }
        var stopout = setTimeout(function() {
            var profit = $('#auto_stats_profit').html();
            var profit = parseFloat(profit);
            if (profit < minus) {
                alert("You got your profit, enjoy");
                kill();
            }
        }, 1);
        var timeout = setTimeout(function() {
            var profit = $('#auto_stats_profit').html();
            var profit = parseFloat(profit);
            if (profit > stop) {
                alert("You got your profit, enjoy");
                kill();
            }
        }, 1);
    }

    function low() {
        
        if (balance < 0.00001) {
            var amount = document.getElementById("amount").value = "0.00000005";
            var chance = $.trim($("#editable-chance-field").val("15%"));
            var payout = document.getElementById('editable-payout').innerHTML = "6.6000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("16"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance < 0.0001 && balance > 0.00001) {
            var amount = document.getElementById("amount").value = "0.00000002";
            var chance = $.trim($("#editable-chance-field").val("66%"));
            var payout = document.getElementById('editable-payout').innerHTML = "1.5000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("660"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance < 0.001 && balance > 0.0001) {
            var amount = document.getElementById("amount").value = "0.00000005";
            var chance = $.trim($("#editable-chance-field").val("17%"));
            var payout = document.getElementById('editable-payout').innerHTML = "5.8235";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("26"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance < 0.01 && balance > 0.001) {
            var amount = document.getElementById("amount").value = "0.00000010";
            var chance = $.trim($("#editable-chance-field").val("10%"));
            var payout = document.getElementById('editable-payout').innerHTML = "9.9000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("12"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance < 0.1 && balance > 0.01) {
            var amount = document.getElementById("amount").value = "0.00000100";
            var chance = $.trim($("#editable-chance-field").val("7.12%"));
            var payout = document.getElementById('editable-payout').innerHTML = "13.9045";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("12"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (balance > 0.1) {
            var amount = document.getElementById("amount").value = "0.0000";
            var chance = $.trim($("#editable-chance-field").val("4.95%"));
            var payout = document.getElementById('editable-payout').innerHTML = "20.0000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("7.77"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        }
        
        var stopout = setTimeout(function() {
            var profit = $('#auto_stats_profit').html();
            var profit = parseFloat(profit);
            if (profit < minus) {
                alert("You got your profit, enjoy");
                kill();
            }
        }, 1);
        
        var timeout = setTimeout(function() {
            var profit = $('#auto_stats_profit').html();
            var profit = parseFloat(profit);
            if (profit > stop) {
                alert("You got your lose, try again:)");
                kill();
            }
        }, 1);
        
    }

    function kill() {
        var stopBot = $('#btn-bet-stop-pilot-dice').click();
        var startBot = $('#btn-bet-start-pilot-dice').click();
        var stopout = setTimeout(function() {
            var profit = $('#auto_stats_profit').html();
            var profit = parseFloat(profit);
            if (profit < minus) {
                alert("You got your profit, enjoy");
                kill();
            }
        }, 1);
        var timeout = setTimeout(function() {
            var profit = $('#auto_stats_profit').html();
            var profit = parseFloat(profit);
            if (profit > stop) {
                alert("You got your lose, try again:)");
                kill();
            }
        }, 1);
    }

    function super_power() {
        // Here is the new method published in version 1.4
        // Currently working only for 0.1 - 1 BTC
        // Makes about 1 BTC in 1 - 2 Minutes
        // 10% risk
        if (balance < 0.001) {
            alert("Your balance is to low for super power, try other method!");
            return false;
        }
        var super_risk = prompt("What's your super power risk?", "1 - Low (1.3%) 2 - Medium (2.5%) 3 -  High (10%), 4 - Mega (15%)", '1');
        if (super_risk == "1") {
            // Super power risk is low
            var amount = document.getElementById("amount").value = "0.0000125";
            var chance = $.trim($("#editable-chance-field").val("44%"));
            var payout = document.getElementById('editable-payout').innerHTML = "2.2500";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("86"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (super_risk == "2") {
            // Super power risk is medium
            var amount = document.getElementById("amount").value = "0.0001";
            var chance = $.trim($("#editable-chance-field").val("41.25%"));
            var payout = document.getElementById('editable-payout').innerHTML = "2.4000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("86"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (super_risk == "3") {
            var amount = document.getElementById("amount").value = "0.001";
            var chance = $.trim($("#editable-chance-field").val("41.25%"));
            var payout = document.getElementById('editable-payout').innerHTML = "2.4000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("86"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else if (super_risk == "4") {
            var amount = document.getElementById("amount").value = "0.004";
            var chance = $.trim($("#editable-chance-field").val("41.25%"));
            var payout = document.getElementById('editable-payout').innerHTML = "2.4000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("86"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        } else {
            // Super power risk is mega
            var amount = document.getElementById("amount").value = "0.004";
            var chance = $.trim($("#editable-chance-field").val("41.25%"));
            var payout = document.getElementById('editable-payout').innerHTML = "2.4000";
            // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
            // jQuery needed here:
            var increase = $.trim($("#pourc-bet-on-lose").val("86"));
            // First click the updated condition
            $('#updated_condition').click();
            // Wait 50 ms
            wait(50);
            $('#btn-bet-start-pilot-dice').click();
            var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
            var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
        }
    }

    function automode() {
        // Here is the method published in version 1.2
        var risk1 = prompt("What's your automode risk? 1 - Low, 2 - Medium, 3 - High", '1');
        if (risk1 != "1" && risk1 != "2" && risk1 != "3") {
            alert("Invalid automode risk, aborting");
            return false;
        }
        if (risk1 == "1") automode_low();
        else if (risk1 == "2") automode_medium();
        else automode_high();

    }

    function switch_mode() {
        var method_1 = Math.random() * 5;
        var method = Math.round(method_1);
        var current = "";
        switch (method) {
            case 1:
                current = "4.95%";
                break;
            case 2:
                current = "5%";
                break;
            case 3:
                current = "7.14%";
                break;
            case 4:
                current = "5.58%";
                break;
            case 5:
                current = "41.25%";
                break;
            default:
                current = "5%";
                break;
        }
        var amount = document.getElementById("amount").value = balance / 10000;

        var chance = $.trim($("#editable-chance-field").val(current));
        //var payout = document.getElementById('editable-payout').innerHTML = "49.5000";
        // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
        // jQuery needed here:
        var current_increase = "";
        switch (current) {
            case "4.95%":
                current_increase = "7.77";
                break;
            case "5%":
                current_increase = "6.66";
                break;
            case "7.14%":
                current_increase = "12";
                break;
            case "5.58%":
                current_increase = "7.89";
                break;
            case "41.25%":
                current_increase = "70";
                break;
            default:
                current_increase = "6.66";
                break;
        }
        var increase = $.trim($("#pourc-bet-on-lose").val(current_increase));
        // First click the updated condition
        $('#updated_condition').click();
        $('#btn-bet-start-pilot-dice').click();
        var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
        var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";

    }

    function automode_low() {
        var amount = document.getElementById("amount").value = "0.00000001";
        var chance = $.trim($("#editable-chance-field").val("49.5%"));
        //var payout = document.getElementById('editable-payout').innerHTML = "2.0000";
        // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
        // jQuery needed here:
        var increase = $.trim($("#pourc-bet-on-lose").val("100"));
        // First click the updated condition
        $('#updated_condition').click();
        $('#btn-bet-start-pilot-dice').click();
        var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
        var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";

    }

    function automode_high() {
        var amount = document.getElementById("amount").value = "0.00000001";
        var chance = $.trim($("#editable-chance-field").val("49.5%"));
        //var payout = document.getElementById('editable-payout').innerHTML = "2.0000";
        // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
        // jQuery needed here:
        var increase = $.trim($("#pourc-bet-on-lose").val("300"));

        // First click the updated condition
        $('#updated_condition').click();
        $('#btn-bet-start-pilot-dice').click();
        var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
        var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";
    }

    function automode_medium() {
        var amount = document.getElementById("amount").value = "0.00000001";
        var chance = $.trim($("#editable-chance-field").val("49.5%"));
        //var payout = document.getElementById('editable-payout').innerHTML = "2.0000";
        // var increase = document.getElementById('pourc-bet-on-lose').value = "2";
        // jQuery needed here:
        var increase = $.trim($("#pourc-bet-on-lose").val("200"));
        // First click the updated condition
        $('#updated_condition').click();
        $('#btn-bet-start-pilot-dice').click();
        var stoprollButton = document.getElementById("btn-bet-stop-pilot-dice").innerHTML = "Stop Bot";
        var startrollButton = document.getElementById("btn-bet-start-pilot-dice").innerHTML = "Start Bot";

    }

    function doubleamount() {
        var attr = $(this).attr("rel");
        var amount = parseFloat($("#amount" + attr).val());
        amount = round_float(amount * 2, devise_decimal);
        $("#amount" + attr).val(amount);
        window['var_amount' + attr] = amount;
        calculate_profit();
    }

})();


// This is the modified bitsler play function
var stopAmount = prompt("Type in the amount after you want to stop", '0.0001');
var again = prompt("Type in  1 if you want to start the bot automatically after getting the profit and 2 for no", '1');
var stopAmountLos = prompt("Type in the amount of lose after u want to stop", '0.5');

var amount = $("#amount").val();
amount = round_float(amount, devise_decimal);
var balance = parseFloat($("#balance-" + devise).val());
console.log(balance);
var chance_1 = parseFloat($.trim($("#editable-chance-field").val()));
var how_much_loses = balance / amount;
console.log(how_much_loses);
var chance = (chance_1 * 0.01 - 1) * (-1);
console.log(chance);
var stopAmountLose = parseFloat(stopAmountLos);
stopAmountLose = stopAmountLose * -1;
var lose_chance = Math.pow(chance, how_much_loses);
if (lose_chance == 0) {
    alert("The chance of losing is under: 0.0000001");
} else {
    alert("The chance of losing is: " + lose_chance * 100 + "%");
}
console.log(stopAmountLose);

if (isNaN(stopAmount) || stopAmount == null) {
    alert("Invalid Profit after to Stop, aborting");
}

function play() {
    if (game_in_progress == true) {
        $("#btn-bet-dice, #btn-bet-start-pilot-dice, #btn-bet-start-fast-dice").button("reset");
        return false;
    }

    game_in_progress = true;

    if (autobet_mode == false) {
        var amount = $("#amount").val();
        var condition = $("#condition-input").val();
        var game = $("#game-input").val();
    } else {
        var amount = auto_amount;
        var condition = auto_condition;
        var game = auto_game;
    }

    amount = round_float(amount, devise_decimal);


    var profit = parseFloat($("#profit").val());
    var balance = parseFloat($("#balance-" + devise).val());
    var error = false;
    var error_value = "";
    var error_title = "";
    var error_info = "";

    if (auto_stats_profit > stopAmount) {
        if (again == "2") {
            error_title = "Got your profit";
            error_info = "You got the profit you want!";
            error_value = "Mainnya udah yaa :* udah opit kan ? kalo mau start lagi refresh dulu browsernya-Tiga Asa Yosa";
            error = true;
        } else {
            roll_by_condition();
            $('#btn-bet-stop-pilot-dice').click();
            $('#btn-bet-start-pilot-dice').click();
        }
    } else if (auto_stats_profit < stopAmountLose) {
        error_title = "Got your lose";
        error_info = "Maximum bet: " + number_format(balance, devise_decimal);
        error_value = "You got the lose";
        error = true;
    } else if (amount > bet_max) {
        error_title = "Bet amount";
        error_info = "Maximum bet: " + number_format(bet_max, devise_decimal);
        error_value = "Bet amount - Maximum bet: " + number_format(bet_max, devise_decimal);
        error = true;
    } else if (amount < bet_min) {
        error_title = "Bet amount";
        error_info = "Minimum bet: " + number_format(bet_min, devise_decimal);
        error_value = "Bet amount - Minimum bet: " + number_format(bet_min, devise_decimal);
        error = true;
    }

    if (error == true) {
        game_in_progress = false;
        $("#btn-bet-dice, #btn-bet-start-pilot-dice, #btn-bet-start-fast-dice").button("reset");

        if (autobet_mode == true) {
            if (number_bet_done >= 1) {
                $("#modal-stop-autobet-numbers").html(number_bet_done);
                $("#modal-stop-autobet-value").html(error_value);
                $("#modal-stop-autobet-reason").modal("show");
            } else {
                showErrorNotification(error_title, error_info);
            }

            stop_pilot_mode();
        } else {
            showErrorNotification(error_title, error_info);
        }

        return;
    }

    $.ajax({
        type: "POST",
        url: server_front_name + "/api/bet",
        data: {
            access_token: access_token,
            username: user_username,
            type: "dice",
            amount: amount,
            condition: condition,
            game: game,
            devise: devise
        },
        success: function(text) {
            var val = JSON.parse(text);
            if (val.return.success == 'true') {
                bet_nb_errors = 0;

                var username = val.return.username;
                var id = val.return.id;
                var type = val.return.type;
                var devise = val.return.devise;
                var ts = val.return.ts;
                var time = val.return.time;
                var winning_chance = val.return.winning_chance;
                var roll_number = val.return.roll_number;
                var amount_return = val.return.amount_return;
                var new_balance = val.return.new_balance;
                var show = val.return.show;
                var amount = val.return.amount;
                var condition = val.return.condition;
                var game = val.return.game;
                var payout = val.return.payout;

                $("#won-bet span").html(amount_return);
                $("#won-bet span").removeClass("text-danger text-success");
                if (amount_return >= 0) {
                    $("#won-bet span").addClass("text-success");
                    $("#won-bet span").html("+" + number_format(round_float(amount_return, 8), 8));
                } else {
                    $("#won-bet span").addClass("text-danger");
                    $("#won-bet span").html(number_format(round_float(amount_return, 8), 8));
                }
                show_result_bet();

                $("#balance-" + devise).val(round_float(new_balance, 12));

                if (amount_return >= 0)
                    $(".balance-" + devise + "-html").addClass("result-bet-win");
                else
                    $(".balance-" + devise + "-html").addClass("result-bet-lose");

                $(".balance-" + devise + "-html").html(round_float(new_balance, 8));

                if (amount_return >= 0)
                    setTimeout(function() {
                        $(".balance-" + devise + "-html").removeClass("result-bet-win");
                    }, 350);
                else
                    setTimeout(function() {
                        $(".balance-" + devise + "-html").removeClass("result-bet-lose");
                    }, 350);

                addBetHistory("my-bets", type, id, username, time, amount, "btc", winning_chance, roll_number, amount_return, condition, game, payout);

                var notifications = val.return.notifications;
                for (var prop in notifications) {
                    if (notifications[prop].name == "rcvJackpotDice")
                        rcvJackpotDice(notifications[prop]);
                    else {
                        rcvnotificationbet(notifications[prop]);
                    }
                }

                var time_delay = getTimeDelay(amount, devise, "dice");

                if (autobet_mode == false) {
                    setTimeout(function() {
                        $("#btn-bet-dice, #btn-bet-start-pilot-dice, #btn-bet-start-fast-dice").button("reset");
                    }, time_delay);
                } else {
                    number_bet_done++;

                    if (unlimited_bet == false) {
                        number_rolls--;
                        $("#limit-rolls-input").val(number_rolls);

                        var pourcBarre = ((number_rolls_total - number_rolls) / number_rolls_total) * 100;
                        $("#progress-bar-pilot-mode div").css("width", pourcBarre + "%");
                    }

                    if (amount_return >= 0) {
                        auto_stats_won++;
                    } else {
                        auto_stats_lost++;
                    }

                    auto_stats_lucky = ((((parseInt(auto_stats_won) / parseInt(number_bet_done)) * 100) / parseFloat(winning_chance)) * 100).toFixed(2);

                    auto_stats_wagered = parseFloat(auto_stats_wagered) + parseFloat(amount);
                    auto_stats_profit = parseFloat(auto_stats_profit) + parseFloat(amount_return);

                    if (on_win == "id-bet-win" && amount_return >= 0) {
                        auto_amount = parseFloat(auto_amount) + parseFloat(auto_amount * (pourc_on_win / 100));
                    } else if (amount_return >= 0) {
                        auto_amount = auto_amount_var;
                    }

                    if (on_lose == "id-bet-lose" && amount_return < 0) {
                        auto_amount = parseFloat(auto_amount) + parseFloat(auto_amount * (pourc_on_lose / 100));
                    } else if (amount_return < 0) {
                        auto_amount = auto_amount_var;
                    }

                    var tmp = Math.pow(10, 8);
                    auto_amount = Math.round(auto_amount * tmp) / tmp;

                    update_stats_auto();

                    if ((number_bet_done < number_rolls_total) || unlimited_bet == true) {
                        var speed_bet_val = $("#speed-bet").val();
                        var time_by_bet = parseInt(time_delay / 50);

                        if (autobet_stop == false) {
                            setTimeout(function() {
                                play();
                            }, time_by_bet);
                        } else {
                            stop_pilot_mode();
                        }
                    } else {
                        stop_pilot_mode();
                    }
                }

                game_in_progress = false;

                if (val.return.event == true) {
                    socket.emit("event", {});
                }
            } else {
                game_in_progress = false;

                if (val.return.type != "abort") {
                    if (autobet_mode == false) {
                        showErrorNotification(val.return.value, val.return.info);
                        $("#btn-bet-dice, #btn-bet-start-pilot-dice, #btn-bet-start-fast-dice").button("reset");
                    } else {
                        if (number_bet_done >= 1) {
                            $("#modal-stop-autobet-numbers").html(number_bet_done);
                            $("#modal-stop-autobet-value").html(val.return.value);
                            $("#modal-stop-autobet-reason").modal("show");
                        } else {
                            showErrorNotification(val.return.value, val.return.info);
                        }

                        stop_pilot_mode();
                    }
                } else {
                    if (bet_nb_errors >= 2) {
                        bet_nb_errors = 0;
                        if (autobet_mode == false) {
                            showErrorNotification(val.return.value, val.return.info);
                            $("#btn-bet-dice, #btn-bet-start-pilot-dice, #btn-bet-start-fast-dice").button("reset");
                        } else {
                            if (number_bet_done >= 1) {
                                $("#modal-stop-autobet-numbers").html(number_bet_done);
                                $("#modal-stop-autobet-value").html(val.return.value);
                                $("#modal-stop-autobet-reason").modal("show");
                            } else {
                                showErrorNotification(val.return.value, val.return.info);
                            }

                            stop_pilot_mode();
                        }

                    } else {
                        bet_nb_errors++;
                        setTimeout(function() {
                            play();
                        }, 1000);
                    }
                }

            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            game_in_progress = false;
            setTimeout(function() {
                play();
            }, 1000);
        },
        timeout: function(xhr, ajaxOptions, thrownError) {
            game_in_progress = false;
            setTimeout(function() {
                play();
            }, 1000);
        },
        abort: function(xhr, ajaxOptions, thrownError) {
            game_in_progress = false;
            setTimeout(function() {
                play();
            }, 1000);
        }
    });


}
