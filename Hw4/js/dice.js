var dice = ["4", "6", "8", "10", "20"];

function start()
{
    selectMode();
    customRoll();
}

function initButton()
{
    for(var value in dice)
    {
        $("#dice").append("<button class='button' id='" + dice[value] +"' value='" + dice[value] + "'>" + dice[value] +"</button>");
        $('.button').click(function()
        {
            $temp = parseInt($(this).attr('id'), 10);
            $temp = Math.floor(Math.random()*($temp) + 1);
            displayRoll($temp);
        });
    }
}

function customRoll()
{
    $('#roll').on("click", function()
    {
        $temp = parseInt($('#inputdice').val(),10);
        $temp = Math.floor(Math.random()*($temp) + 1);
        displayRoll($temp);
        console.log($temp);
    });
}

function selectMode()
{
    
    $('#premade').on("click", function()
    {
        $('#select').hide();
        $('#dice').show();
        initButton();
    });
    
    $('#custom').on("click",function()
    {
        $('#select').hide();
        $('#input').show();
    });
}

function displayRoll(dice)
{
    $('#result').show();
    $('#result').html("");
    $('#result').append(dice);
}

window.onload = start;