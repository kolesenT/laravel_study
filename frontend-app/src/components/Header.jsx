import { NavLink } from "react-router-dom";

const Header = () => {
    return (
        <nav className="navbar navbar-expand-lg navbar-light bg-light">
            <div className="container">
                <ul className="navbar-nav mr-auto">
                    <li className="nav-item">
                        <NavLink className="nav-link" to={'/'}>Movies</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={'/genres'}>Genres</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={'/actors'}>Actors</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={'/about'}>About</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={'/todolist'}>ToDoList</NavLink>
                    </li>
                    <li className="nav-item">
                        <NavLink className="nav-link" to={'/thermo'}>Thermometer</NavLink>
                    </li>
                </ul>
            </div>
        </nav>
    );
};

export default Header;
