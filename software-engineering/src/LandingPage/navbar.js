import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {faBars, faX, faShoppingCart, faUser, faMagnifyingGlass} from "@fortawesome/free-solid-svg-icons";
import React, {useState} from "react";
import { Link } from "react-router-dom";
import { NavBarItems } from "./LandingPageData/navbardata";
import './LandingPageStyling/navbar.css'

function NavBar(){
        const [sidebar, setSideBar] = useState(false);
        const showSideBar = () => setSideBar(!sidebar);
        
        return(
            <>
            <div class = "navbar">  
                    <button id = "hamburger-icon" onClick={showSideBar}>
                        <FontAwesomeIcon icon= {faBars}/>
                    </button>
                    <button id = "search-icon">
                        <FontAwesomeIcon icon= {faMagnifyingGlass}/>
                    </button>
                     <Link to="/" style={{textDecoration:"none"}}><span> hug with mug </span></Link>
                     <div class = "logo"></div>
                    <button id = "shopping-icon"> 
                        <FontAwesomeIcon icon= {faShoppingCart}/>
                    </button>
                    <button id = "user-icon"> 
                        <FontAwesomeIcon icon= {faUser}/>
                    </button>
            </div>
            <nav class = {sidebar ? 'navbar-menu active' : 'navbar-menu'}>
                   
                    <button id = "x-icon">
                        <FontAwesomeIcon icon={faX}/>
                    </button>
                    <ul class = "navbar-items" onClick={showSideBar}>
                        {NavBarItems.map((item, index) => {
                            return (
                               <li key={index} class={item.cName}>
                                   <Link to={item.path} style={{textDecoration:"none"}}>
                                       <span>{item.title}</span>
                                   </Link>
                               </li> 
                            );
                        })}
                    </ul>
            </nav>
            </>
                  
        );
    
}

export default NavBar;