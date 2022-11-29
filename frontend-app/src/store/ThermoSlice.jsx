import { createSlice } from "@reduxjs/toolkit"

const ThermoSlice = createSlice({
    name: 'thermo',
    initialState: {
        value: 0,
    },
    reducers: {
        rise: (state, action) => {
            state.value += action.payload;
        },

        drop: (state, action) => {
            state.value -= action.payload;
        },
    },
});

export default ThermoSlice.reducer;
export const { rise, drop } = ThermoSlice.actions;
export const getThermo = state => state.thermo.value;