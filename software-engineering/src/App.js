import LandingPage from "./LandingPage/landingpage";
import NavBar from "./LandingPage/navbar";
import Footer from "./LandingPage/footer";
import About from "./Pages/About/about"
import Contact from "./Pages/Contact/contact"
import Shop from "./Pages/Shopping/shop"
import {BrowserRouter as Router, Routes, Route} from "react-router-dom"

function App() {
  return (
   <div class = "app">
     <Router>
      <NavBar/>
     <LandingPage/>
          <Routes>
              <Route path='/shop' element={<Shop/>} ></Route>
              <Route path='/about' element={<About/>} ></Route>
              <Route path='/contact' element={<Contact/>} ></Route>
          </Routes>
          <Footer/>
     </Router>
     
    </div>
  );
}

export default App;
