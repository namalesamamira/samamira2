var start_scroll_at:number;

class Scroll_toggler {

    body:HTMLElement;
    scrollUp:string;
    scrollDown:string;
    currentScroll:number = 0;
    lastScroll:number = 0;
    is_scrolled:Boolean = false;
    // start_scroll_at:number;
    scrollY:number = 0;

    constructor (start_scroll_at2:number) {//TODO: set default value
        // this.start_scroll_at = start_scroll_at;
        this.is_scrolled = false;
        this.body = document.body;
        this.scrollUp = "scrolling-up";
        this.scrollDown = "scrolling-down";
        this.lastScroll = 0;
        this.currentScroll = 0;
        this.is_scrolled = false;
        start_scroll_at = start_scroll_at2;//TODO: proposed default value
        this.scrollY = 0;
        window.addEventListener("scroll", this.update);//update is a reference to the function, not the actual function
        this.update(); //run on load so that the header display is correct on load
    }

    update () {
        this.body = document.body;
        this.scrollUp = "scrolling-up";
        this.scrollDown = "scrolling-down";
        this.scrollY = window.pageYOffset;
        // this.start_scroll_at = 150;//TODO: get from constructor
        // this.start_scroll_at = start_scroll_at;//TODO: get from constructor
        // console.log(this.body.classList);
        // console.log(100+(window.pageYOffset/100));
        // console.log("window.scrollY", window.scrollY);
        // console.log("this.scrollY", this.scrollY);
        // console.log("this.start_scroll_at",this.start_scroll_at);
        // console.log("start_scroll_at",start_scroll_at);
        this.currentScroll = window.pageYOffset;
        // console.log("currentScroll", this.currentScroll);

        if (this.currentScroll <= 0) {
            // console.log("currentScroll <= 0");
            this.body.classList.remove(this.scrollUp);
            // this.scrollY = 0;
            // return;
        }

        // if (currentScroll > this.lastScroll && !this.body.classList.contains(this.scrollDown)) {
        //     // down
        //     this.body.classList.remove(this.scrollUp);
        //     this.body.classList.add(this.scrollDown);
        // } else if (
        //     currentScroll < this.lastScroll &&
        //     this.body.classList.contains(this.scrollDown)
        // ) {
        //     // up
        //     this.body.classList.remove(this.scrollDown);
        //     this.body.classList.add(this.scrollUp);
        // }
        // this.lastScroll = currentScroll;


        // console.log("window.scrollY", window.scrollY);
        // console.log("this", this);//TODO: why is this undefined?
        // console.log("this.current_start_scroll_at", this.current_start_scroll_at);//TODO: why is this undefined?
        // console.log("this.start_scroll_at", this.start_scroll_at);



        if (this.scrollY > start_scroll_at){//TODO: start scrolling after some interaction
            // console.log("this.scrollY > start_scroll_at");
            if (this.currentScroll > this.lastScroll && !this.body.classList.contains(this.scrollDown)) {
                // down
                this.body.classList.remove(this.scrollUp);
                this.body.classList.add(this.scrollDown);
                // console.log("update() down");
            } else if (
                this.currentScroll < this.lastScroll &&
                this.body.classList.contains(this.scrollDown)
            ) {
                // up
                this.body.classList.remove(this.scrollDown);
                this.body.classList.add(this.scrollUp);
                // console.log("update() up");
            }
            this.lastScroll = this.currentScroll;
        } else {
            // console.log("this.scrollY < start_scroll_at");
        }
    }

    // get current_scroll_value (){
    //     return this.scrollY;
    // }

    // get current_start_scroll_at (){
    //     return this.start_scroll_at;
    // }

    // set current_start_scroll_at (val){
    //     this.start_scroll_at = val;
    // }

    // get current_is_scrolled (){
    //     return this.is_scrolled;
    // }

    // set current_is_scrolled (val){
    //     this.is_scrolled = val;
    // }

    //Get current scroll height
    // get id scrolled is true
    // set new scroll height
}
