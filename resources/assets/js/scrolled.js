"use strict";
var start_scroll_at;
class Scroll_toggler {
    constructor(start_scroll_at2) {
        this.currentScroll = 0;
        this.lastScroll = 0;
        this.is_scrolled = false;
        // start_scroll_at:number;
        this.scrollY = 0;
        // this.start_scroll_at = start_scroll_at;
        this.is_scrolled = false;
        this.body = document.body;
        this.scrollUp = "scrolling-up";
        this.scrollDown = "scrolling-down";
        this.lastScroll = 0;
        this.currentScroll = 0;
        this.is_scrolled = false;
        start_scroll_at = start_scroll_at2; //TODO: proposed default value
        this.scrollY = 0;
        window.addEventListener("scroll", this.update); //update is a reference to the function, not the actual function
        this.update(); //run on load so that the header display is correct on load
    }
    update() {
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
        if (this.scrollY > start_scroll_at) { //TODO: start scrolling after some interaction
            // console.log("this.scrollY > start_scroll_at");
            if (this.currentScroll > this.lastScroll && !this.body.classList.contains(this.scrollDown)) {
                // down
                this.body.classList.remove(this.scrollUp);
                this.body.classList.add(this.scrollDown);
                // console.log("update() down");
            }
            else if (this.currentScroll < this.lastScroll &&
                this.body.classList.contains(this.scrollDown)) {
                // up
                this.body.classList.remove(this.scrollDown);
                this.body.classList.add(this.scrollUp);
                // console.log("update() up");
            }
            this.lastScroll = this.currentScroll;
        }
        else {
            // console.log("this.scrollY < start_scroll_at");
        }
    }
}
