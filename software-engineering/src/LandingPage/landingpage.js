import React from "react";
import './LandingPageStyling/landingpage.css'
import { SlideShowData } from "./LandingPageData/slideshowdata";


function LandingPage() {
        return(
            <div className="page">
                <div class = "slideshow">
                    {SlideShowData.map((slide, index) => {
                        return (
                            <div class = "slider">
                            <img 
                            key={index}
                            src={slide.image}
                            alt={slide.title}/>
                            </div>
                    );
                    })}
                </div>
            </div>
        );
        
}

export default LandingPage;