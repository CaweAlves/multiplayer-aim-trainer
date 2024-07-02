<?php

?>

<div x-data="score">
    score: <p x-text="userScore" />
</div>
<script>
     document.addEventListener('alpine:init', () => {
        console.log("a")
        Alpine.data('score', () => ({
            userScore: 0,
            init() {
                console.log(this.userScore)
                Echo.channel('click')
                    .listen('ClickEvent', (e) => {
                        console.log(e)
                        this.userScore = e.score;
                    });
            },
        }));
    });
</script>  