class Scroll_toggler{

    body:String = document.body;
    scrollUp:String = "scrolling-up";
    scrollDown:String = "scrolling-down";
    lastScroll:Boolean = 0;

    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll <= 0) {
            body.classList.remove(scrollUp);
            return;
        }

        if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
            // down
            body.classList.remove(scrollUp);
            body.classList.add(scrollDown);
        } else if (
            currentScroll < lastScroll &&
            body.classList.contains(scrollDown)
        ) {
            // up
            body.classList.remove(scrollDown);
            body.classList.add(scrollUp);
        }
        lastScroll = currentScroll;
    });


    constructor (start_scroll_at) {//TODO: set default value
        this.start_scroll_at = start_scroll_at;
        this.is_scrolled = false;
        window.addEventListener("scroll", this.update);//update is a reference to the function, not the actual function
    }

    update () {
        // console.log("update()");
        // console.log("window.scrollY", window.scrollY);
        // console.log("this", this);//TODO: why is this undefined?
        // console.log("this.current_start_scroll_at", this.current_start_scroll_at);//TODO: why is this undefined?
        // console.log("this.start_scroll_at", this.start_scroll_at);

        // if (this.scrollY > this.current_start_scroll_at){
        if (this.scrollY > 120 && this.scrollY < 550){
            // console.log( "greater" );
            document.querySelector('body').classList.add('scrolled');
            document.querySelector('body').classList.remove('hide_header');
            this.is_scrolled = true;
        }else if (this.scrollY > 550){
            // console.log( "greater" );
            document.querySelector('body').classList.add('hide_header');
            document.querySelector('body').classList.remove('scrolled');
            this.is_scrolled = true;
        } else {
            // console.log( "lesser" );
            document.querySelector('body').classList.remove('scrolled');
            document.querySelector('body').classList.remove('hide_header');
            this.is_scrolled = false;
        }
    }

    get current_scroll_value (){
        return this.scrollY;
    }

    get current_start_scroll_at (){
        return this.start_scroll_at;
    }

    set current_start_scroll_at (val){
        this.start_scroll_at = val;
    }

    get current_is_scrolled (){
        return this.is_scrolled;
    }

    set current_is_scrolled (val){
        this.is_scrolled = val;
    }

    //Get current scroll height
    // get id scrolled is true
    // set new scroll height
}
