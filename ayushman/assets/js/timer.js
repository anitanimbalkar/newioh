	
//Timer js.
// This js allows user to start timer. it can be started using InitializeTimer(sec) function. 
// timeout event will be fired if timer stops.

var secs;
var timerID = null;
var timerRunning = false;
var delay = 1000;

function InitializeTimer(sec)
{
    // Set the length of the timer, in seconds
    secs = sec;
	timerID = null;
	timerRunning = false;
	delay = 1000;
    StopTheClock();
    StartTheTimer();
}

function StopTheClock()
{
    if(timerRunning)
        clearTimeout(timerID);
    timerRunning = false;
}

function StopTimer()
{
	clearTimeout(timerID);
}

function StartTheTimer()
{
    if (secs==0)
    {
        StopTheClock();
        timeout();
    }
    else
    {
		// if not forcefuly stopped.
		TimeElapsed(secs);
		self.status = secs;
		secs = secs - 1;
		timerRunning = true;
		timerID = self.setTimeout("StartTheTimer()", delay);
    }
}