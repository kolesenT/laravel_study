import { configureStore } from "@reduxjs/toolkit";
import reducer from "./ToDoSlice";
import { default as thermoReducer } from "./ThermoSlice";


const store = configureStore(
    {
        reducer: {
            items: reducer,
            thermo: thermoReducer,
        },

    },
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);

export default store;