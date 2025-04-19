import {transformWithEsbuild} from "vite";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            sm: "340px",
            md: "540px",
            lg: "768px",
            xl: "1180px"
        },
        fontFamily:{
            Lobster: ["Lobster", "sans-serif"],
            Jost: ["Jost", "sans-serif"],
            Roboto: ["Roboto", "sans-serif"],
            Lato: ["Lato", "sans-serif"],
            Baskerville: ["Libre Baskerville", "serif"]
        },
        extend: {
            transitionProperty: {
                'height': 'height',
                'spacing': 'margin, padding',
            }},
        keyframes:{
            move: {
                "50%" : {transform: "translateY(-2rem)"}
            },
            scroll: {
                "0%" : {transform: "translateX(0px)",
                    animationPlayState: "paused",
                },
                "25%": { transform: 'translateX(-1355px)',
                    animationPlayState: 'running'
                },
                "50%" : {transform: "translateX(-1355px)",
                    animationPlayState: "paused",
                },
                "75%" : {transform: "translateX(0px)",
                    animationPlayState: "running"
                },
                "100%" : {transform: "translateX(0px)",
                    animationPlayState: "paused",
                },


            },
            hardAnimation:{
              "10%": {transform: "translateY(98px) translateX(170px)"},
              "15%": {transform: "translateY(70px) translateX(240px)"},
              "20%": {transform: "translateY(98px) translateX(320px)"},
              "25%": {transform: "translateY(70px) translateX(390px)"},
              "30%": {transform: "translateY(98px) translateX(460px)"},
              "35%": {transform: "translateY(70px) translateX(530px)"},
              "40%": {transform: "translateY(98px) translateX(600px)"},
              "45%": {transform: "translateY(70px) translateX(680px)"},
              "50%": {transform: "translateY(98px) translateX(760px)"},
              "55%": {transform: "translateY(70px) translateX(840px)"},
              "60%": {transform: "translateY(98px) translateX(920px)"},
              "65%": {transform: "translateY(70px) translateX(1000px)"},
              "70%": {transform: "translateY(98px) translateX(1080px) "},
              "75%": {transform: "translateY(70px) translateX(1160px) scale(0.7)"},
              "80%": {transform: "translateY(98px) translateX(1240px) scale(0.6)"},
              "85%": {transform: "translateY(110px) translateX(1270px) scale(0.5)",
              animationPlayState: 'paused' },
              "86%": {transform: "translateY(110px) translateX(1270px) scale(0.5)",
                  animationPlayState: 'running'},
              "90%": {transform: "translateY(125px) translateX(1240px) scale(0.4)"},
              "95%": {transform: "translateY(140px) translateX(1200px) scale(0.3)"},
              "100%": {transform: "translateY(150px) translateX(1188px) scale(0.2)"},


            },
            rotate: {
              "0%" : {transform: "rotate(0deg)"},
              "100%" : {transform: "rotate(360deg)"}
            },
            scaleUp:{
                "0%": {transform: "scale(0.95)"},
                "50%": {transform: "scale(1)"},
                "100%": {transform: "scale(0.95)"},
            },
            slide:{
                "0%": {transform: "translateY(-3rem)"},
                "100%": {transform: "translateY(0rem)"}
            },
            exclamation: {
                "0%" : {transform: "translateY(0px)"},
                "100%" : {transform: "translateY(20px)"}
            },
            leftMenu: {
                "0%" : {width: "0px"},
                "50%" : {width: "150px"},
                "100%": {width: "300px"}
            }
        },
        animation: {
            exclamation: "exclamation 2s ease-out forwards",
            hardAnimation: "hardAnimation 4s linear forwards",
            shadow: "hardAnimation 4s linear 50ms forwards",
            twoShadow: "hardAnimation 4s linear 80ms forwards",
            slide: "slide 2s ease",
            scrolling: "scroll 10s cubic-bezier(.1,1.08,0,1) infinite",
            movingY: "move 3s linear infinite",
            rotating: "rotate 15s linear infinite",
            leftMenu: "leftMenu 0.3s linear both",
            scalingUp: "scaleUp 4s ease-out infinite"
        },

        container:{
            center: true,

        }


    },
    plugins: [],
}
